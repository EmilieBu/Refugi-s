<?php

namespace Tropi\CampsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Entity\Refugie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UtilisateurController extends Controller
{
	// tc_homepage
    public function indexAction(Request $request){
        return 0;
    }

    //tc_refugie
    public function refugieAction($id){
        $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Refugie');
        $refugie = $repository->find($id);

        var_dump($refugie);
        $response = new Response(json_encode( $refugie->getNom() ));
        //$response->headers->set('Content-Type', 'application/json');

    	return $response;
    }

    //tc_camp:
    public function campAction($id){
        $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Camp');
        $camp = $repository->find($id);

        if (null === $camp) {
            throw new NotFoundHttpException("Le camp d'id ".$id." n'existe pas.");
        }

        var_dump($camp);
        $response = new Response(json_encode( $camp->getNom() ));
        //$response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    //tc_recherche:
    public function rechercheAction(){
    	return 0;
    }


}

