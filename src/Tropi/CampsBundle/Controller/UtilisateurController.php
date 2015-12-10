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
        $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Refugie');
        $refugie = $repository->find($id);

        if (null === $refugie) {
            throw new NotFoundHttpException("Le refugie d'id ".$id." n'est pas dans notre base de données'.");
        }

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
    public function rechercheAction($critRchrch){

        $repository=$this
        ->getDoctrine()
        ->getManager
        ->getRepository('TropiCampsBundle:Refugie');

        $listRefugie=$repository->findBy(
            array $critRchrch,
            array $orderBy = null,
            $limit = null,
            $offset = null
            );

        var_dump(($listRefugie))
        $response = new Response(json_encode($listRefugie));


    	return response;
    }


}

