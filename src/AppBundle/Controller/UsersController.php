<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Users;
use AppBundle\Entity\Roles;
use AppBundle\Entity\Permissions;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsersController extends Controller
{
    /**
     * @Route("/user/register", name="user_register")
     */
    public function registerAction(Request $request) {
        $users = new Users();
        $form = $this->createFormBuilder($users)
                     ->add('username', TextType::class)
                     ->add('email', EmailType::class)
                     ->add('plainPassword', PasswordType::class)
                     ->add('inscription', SubmitType::class)
                     ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->get('security.password_encoder')->encodePassword($users, $users->getPlainPassword());
            $users->setPassword($password);

            $users->setCity(1);
            $users->setAdress("");
            $users->setPhone(0);
            $users->setBio("");
            $users->setGalery(1);
            $users->setNbrexpo(1);
            $users->setFirstname("");
            $users->setLastname("");

            $em = $this->getDoctrine()->getManager();

            $role = $em->getRepository('AppBundle\Entity\Roles')->findOneById(1);
            $users->setRole($role);

            try {
                $em->persist($users);
                $em->flush();

                return $this->redirectToRoute('user_login');
            }
            catch(\Exception $ex) {
                // TODO
            }
        }

        return $this->render('default/register.html.twig',  ['form' => $form->createView()]);
    }

    /**
     * @Route("/user/login", name="user_login")
     */
    public function loginAction(Request $request){
        $u = new Users();
        $form = $this->createFormBuilder($u)
                     ->add('email', EmailType::class)
                     ->add('plainPassword', PasswordType::class)
                     ->add('connexion', SubmitType::class)
                     ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('AppBundle\Entity\Users')->findOneBy(['email' => $u->getEmail()]);

            $valid = false;
            if (!empty($user)) {
                $valid = $this->get('security.password_encoder')->isPasswordValid($user, $u->getPlainPassword());
            }

            if($valid) {
                $session = $request->getSession();
                $session->invalidate();
                $session->set('user_id', $user->getId());
                $session->set('user_name', $user->getUsername());
                $session->set('user_role', $user->getRole()->getRole());

                return $this->redirectToRoute('index');
            }
            else {
                return $this->redirectToRoute('user_login');
            }
        }

        return $this->render('default/login.html.twig',  ['form' => $form->createView()]);
    }

    /**
     * @Route("/user/logout", name="user_logout")
     */
    public function logoutAction(Request $request) {
        $session = $request->getSession();
        $session->invalidate();
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/user/profile/{id}/", name="user_profile")
     */
    public function profileAction($id) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle\Entity\Users')->findOneById($id);
        if (empty($user)){
            return new Response("FUCK OFF !");
        }
        $u = [];

        $u ['id'] = $user->getId();
        $u ['username'] = $user->getUsername();
        $u ['firstname'] = $user->getFirstname();
        $u ['birthday'] = $user->getBirthday();
        $u ['lastname'] = $user->getLastname();
        $u ['adress'] = $user->getAdress();
        $u ['city'] = $user->getCity();
        $u ['profilpicture'] = $user->getProfilpicture();
        $u ['email'] = $user->getEmail();
        $u ['phone'] = $user->getPhone();
        $u ['nbrExpo'] = $user->getNbrexpo();
        $u ['galery'] = $user->getGalery();
        $u ['role'] = $user->getRole()->getName();


        return $this->render('default/profil.html.twig', ['user' => $user]);

    }
}
