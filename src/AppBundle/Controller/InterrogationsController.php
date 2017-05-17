<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Interrogations;

class InterrogationsController extends Controller
{
    /**
     * @Route("/faq", name="faq")
     */
    public function indexAction()
    {
        //appelle entity manager
        $em = $this->getDoctrine()->getManager();
        // Liste d'articles recup depuis la bdd en tenant compte de la position (ordre ascendant)
        $interrogation = $em->getRepository('AppBundle:Interrogation')->findBy(array(), array('position'=>'asc'));
        // renvoie la vue sur twig
        return $this->render('default/interrogations.html.twig', array(
            'interrogation' => $interrogation,
        ));

    }
}
