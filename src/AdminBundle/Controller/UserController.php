<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/admin/user", name="admin_user_index")
     */
    public function IndexAction(Request $request)
    {
        $session = $request->getSession();

        // Si n'est pas admin
        if ($session->get('user_role') != 4) {
            return $this->redirectToRoute('index');
        }

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle\Entity\Users')->findAll();
        $roles = $em->getRepository('AppBundle\Entity\Roles')->findAll();

        return $this->render('AdminBundle:User:index.html.twig', array(
            'users' => $users,
            'roles' => $roles,
        ));
    }

    /**
     * @Route("/admin/user/view")
     */
    public function ViewAction()
    {
        return $this->render('AdminBundle:User:view.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/admin/user/edit")
     */
    public function EditAction()
    {
        return $this->render('AdminBundle:User:edit.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/admin/user/delete")
     */
    public function DeleteAction()
    {
        return $this->render('AdminBundle:User:delete.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/admin/user/add", name="admin_user_add")
     */
    public function AddAction()
    {
        return $this->render('AdminBundle:User:add.html.twig', array(
            // ...
        ));
    }

}
