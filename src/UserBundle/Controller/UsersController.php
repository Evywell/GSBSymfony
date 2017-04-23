<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;

class UsersController extends Controller
{

    public function indexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $groupe = $user->getGroupe();
        if($groupe->getLibelle() === "comptable") {
            return $this->redirectToRoute('comptable_homepage');
        }
        if($groupe->getLibelle() === "visiteur") {
            return $this->redirectToRoute('visiteur_homepage');
        }
        return new Response("Impossible d'afficher la page : vous possédez un role non défini");
    }

}
