<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use AppBundle\Entity\Landing;


class DefaultController extends Controller
{
    /**
      * @Route("/", name="index")
      */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $carousel = $em->getRepository('AppBundle\Entity\Landing')->findBy(['categorie' => 1]);

        return $this->render('default/index.html.twig', ['carousel' => $carousel]);
    }

}
