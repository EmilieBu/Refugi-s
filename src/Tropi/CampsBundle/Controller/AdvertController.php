<?php

// src/Tropi/CampsBundle/Controller/AdvertController.php

namespace Tropi\CampsBundle\Controller;

//Use:
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller{
	
	public function indexAction(){
		
		$content = $this->get('templating')
		->render('TropiCampsBundle:Advert:index.html.twig', array('nom' => 'Francis'));
		return new Response($content);
	}
	
	public function viewAction($id){
		return new Response("Affichage de l'annonce d'id : ".$id);
	}
}
?>