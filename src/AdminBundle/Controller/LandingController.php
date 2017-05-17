<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class LandingController extends Controller
{
    /**
     * @Route("/admin/landing", name="admin_landing_index")
     */
    public function IndexAction(Request $request)
    {
        $session = $request->getSession();

        // Si n'est pas admin
        if ($session->get('user_role') != 4) {
            return $this->redirectToRoute('index');
        }

        $em = $this->getDoctrine()->getManager();
        $carousel = $em->getRepository('AppBundle\Entity\Landing')->findAll();

        return $this->render('AdminBundle:Landing:index.html.twig', array(
            'carousel' => $carousel
        ));
    }

}
