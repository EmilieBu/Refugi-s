<?php

namespace Tropi\CampsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Entity\Refugie;

class UtilisateurController extends Controller
{
	// tc_homepage
    public function indexAction()
    {
        $name = "aze";
        return $this->get('templating')->renderResponse(
        	'TropiCampsBundle:Default:index.html.twig',
        	array('name'=>$name));
    }

    //tc_refugie
    public function refugieAction($id){
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

