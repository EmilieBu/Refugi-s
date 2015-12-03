<?php

namespace Tropi\CampsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Entity\Refugie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UtilisateurController extends Controller
{
	// tc_homepage
    public function indexAction(Request $request)
    {
        $refugie = new Refugie();
        $form = $this->createForm(new RefugieType(), $refugie,  array(
            'action' => $this->generateUrl('tc_homepage'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Entity manager
            $em->persist($refugie);
            $em->flush();

            $response = new Response(json_encode( array('err' => '0' ) ));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }

        return $this->render('TropiCampsBundle:Public:index.html.twig', array('form' => $form->createView()));
    }

    //tc_refugie
    public function refugieAction($id){
        var_dump($id);
    	return 0;
    }

    //tc_camp:
    public function campAction($id){
    	return 0;
    }

    //tc_recherche:
    public function rechercheAction(){
    	return 0;
    }


}

