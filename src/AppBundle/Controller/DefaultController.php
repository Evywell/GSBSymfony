<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    public function comptableIndexAction()
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $libelle = $user->getGroupe()->getLibelle();
        if($libelle !== "comptable") {
            $this->get('session')->getFlashBag()->set('danger', "Vous ne pouvez pas accéder à cette page");
            return $this->redirectToRoute('home_page');
        }
        // Récupération des visiteurs
        $visiteurs = $this->getDoctrine()->getRepository('UserBundle:User')->getVisiteurs()->getResult();

        return $this->render('AppBundle:Comptable:index.html.twig', ['visiteurs' => $visiteurs]);
    }

    public function comptableViewAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository('AppBundle:FicheFrais');
        $fiches = $model->getFichesAValiderById($id)->getResult();
        if(!$fiches) {
            throw $this->createNotFoundException(sprintf("Il n'y a pas de fiche de frais avec l'id %s", $id));
        }
        return $this->render('AppBundle:Comptable:view.html.twig', ['fiches' => $fiches]);
    }

    public function comptableAjaxViewAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository('AppBundle:FicheFrais');
        $fiches = $model->getFichesAValiderById($id)->getArrayResult();
        if(!$fiches) {
            throw $this->createNotFoundException(sprintf("Il n'y a pas de fiche de frais avec l'id %s", $id));
        }
        return new JsonResponse(array('data' => $fiches));
    }



}
