<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class CharteController extends Controller
{
    /**
     * @Route("/admin/charte", name="admin_charte_index")
     */
    public function IndexAction(Request $request)
    {
        $session = $request->getSession();

        // Si n'est pas admin
        if ($session->get('user_role') != 4) {
            return $this->redirectToRoute('index');
        }

        $em = $this->getDoctrine()->getManager();
        $charte = $em->getRepository('AppBundle\Entity\Charte')->findAll();

        return $this->render('AdminBundle:Charte:index.html.twig', array(
            'charte' => $charte
        ));
    }

}
