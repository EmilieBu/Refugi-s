<?php

namespace Tropi\CampsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Entity\Refugie;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $refugie = new Refugie();
        $form = $this->createForm(new RefugieType(), $refugie);
        
        return $this->render('TropiCampsBundle:Default:index.html.twig', array('name' => $name, 'form' => $form->createView()));
    }
}
