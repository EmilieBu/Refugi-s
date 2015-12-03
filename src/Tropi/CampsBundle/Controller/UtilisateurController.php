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
        $name = "Visiteur";
        return $this->render(
        	'TropiCampsBundle:Default:index.html.twig',
        	array('name'=>$name));
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

