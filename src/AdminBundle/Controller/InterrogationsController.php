<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class InterrogationsController extends Controller
{
    /**
     * @Route("/admin/faq", name="admin_faq_index")
     */
    public function IndexAction(Request $request)
    {
        $session = $request->getSession();

        // Si n'est pas admin
        if ($session->get('user_role') != 4) {
            return $this->redirectToRoute('index');
        }

        $em = $this->getDoctrine()->getManager();
        $interrogations = $em->getRepository('AppBundle\Entity\Interrogation')->findAll();

        return $this->render('AdminBundle:Interrogations:index.html.twig', array(
            'interrogations' => $interrogations
        ));
    }

}
