<?php

namespace Tropi\CampsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Entity\Refugie;

class PublicController extends Controller
{
    public function indexAction()
    {
        $refugie = new Refugie();
        $form = $this->createForm(new RefugieType(), $refugie);
        
        return $this->render('TropiCampsBundle:Public:index.html.twig', array('form' => $form->createView()));
    }
}
