<?php

/**
 * ChatController
 *
 * @package Chat Kar:sm
 * @author Emilie Letailleur
 * @copyright 2017 Kar:sm
 *
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Messages;
use AppBundle\Entity\Expositions;
use AppBundle\Entity\Users;
use AppBundle\Entity\Permissions;
use AppBundle\Entity\Roles;


class ChatController extends Controller
{
    /**
     * @Route("/chat/list", name="chat_list_msg")
     */
    public function listmessageAction() {
        $em = $this->getDoctrine()->getManager();
        $messages = $em->getRepository('AppBundle:Messages')->findAll();

        //Pour chaque message je veux recuperer text auteur et time
        $msgs = [];
        foreach ($messages as $message) {
            $msgs[] = ["text" => $message->getTexte(),
                "author" => ['username' => $message->getAuthor()->getUsername(),
                    'profilPicture' => $message->getAuthor()->getprofilPicture()],
                "time" => date("d/m/o H:i", $message->getTime())];
        }

        $response = new Response(json_encode($msgs));
        $response->headers->set('Content-Type', 'application/json');
        $response->setCharset('UTF-8');
        return $response;
    }

    /**
     * @Route("/chat/send", name="chat_send_msg")
     */
    public function sendmessageAction(Request $request) {
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->setCharset('UTF-8');

        $user = $request->request->get('id');
        $message = $request->request->get('message');

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:Users')->findOneById(intval($user));
        $expo = $em->getRepository('AppBundle:Expositions')->findOneById(1);
        // if (empty($user) or (!$user->getArtistvalidate() and !$user->getHotevalidate())) {
        //     $response->setContent(json_encode("ERROR"));
        //     return $response;
        // }

        $message = trim(strip_tags($message));

        $msg = new Messages();
        $msg->setAuthor($user);
        $msg->setTexte($message);
        $msg->setExpositions($expo);
        $msg->setTime(time());

        $response->setContent(json_encode(["message" => "OK"]));

        try {
            $em->persist($msg);
            $em->flush();
        }
        catch(\Exception $ex) {
            $response->setContent(json_encode(["message" => "ERROR : " . $ex->getMessage()]));
        }

        $response->headers->set('Content-Type', 'application/json');
        $response->setCharset('UTF-8');
        return $response;
    }
}
