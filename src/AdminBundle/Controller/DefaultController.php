<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function indexAction(Request $request)
    {
        $session = $request->getSession();

        // Si n'est pas admin
        if ($session->get('user_role') != 4) {
            return $this->redirectToRoute('index');
        }

        return $this->render('AdminBundle:Default:index.html.twig');
    }
}
