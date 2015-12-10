<?php

namespace Tropi\CampsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Entity\Refugie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

#TROPICAMPS ADMIN

class StaffController extends Controller
{

    public function indexAction(){
        return $this->render('TropiCampsBundle:Staff:index.html.twig');
    }
    // affiche la liste de ref + nouveau ref
    public function refAction(Request $request){
        $refugie = new Refugie();
        
        $repository = $this->getDoctrine()->getRepository('TropiCampsBundle:Refugie');
        $refugies = $repository->findAll();
        
        $form = $this->createForm(new RefugieType(), $refugie,  array(
            'action' => $this->generateUrl('tca_ref'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Entity manager
            $em->persist($refugie);
            $em->flush();

            return $this->render('TropiCampsBundle:Staff:ref.html.twig', array('form' => $form->createView(),'refName' => $refugie->getNom(),'refugies' => $refugies));
        }
        return $this->render('TropiCampsBundle:Staff:ref.html.twig', array('form' => $form->createView(),'refugies' => $refugies));
    }
    
    #Modifier un réfugie
    //tca_mod_refugie
    public function modRefAction($id){
        $request = $this->get('request');
        $em = $this->getDoctrine()->getEntityManager();
        $refugie = $em->getRepository('TropiCampsBundle:Refugie')->find($id);
        
        if(!isset($refugie)){
            return new RedirectResponse($this->generateUrl('tca_ref'));
        }
        $form = $this->createForm(new RefugieType(), $refugie,  array(
        'action' => $this->generateUrl('tca_mod_refugie',array('id'=>$id)),
        'method' => 'POST',
        ));
        
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid())
            {
                $em->persist($refugie);
                $em->flush();
            }
        }
        return $this->render('TropiCampsBundle:Staff:refpage.html.twig', array('form' => $form->createView(),'refugie' => $refugie)); 
    }

    #Supprimer un refugie
    //tca_del_refugie:
    public function delRefAction($id){
         $em = $this->getDoctrine()->getEntityManager();
        $refugie = $em->getRepository('TropiCampsBundle:Refugie')->find($id);
        if(!isset($refugie)){
            return new RedirectResponse($this->generateUrl('tca_ref'));
        }
        $em->remove($refugie);
        $em->flush();
    	return new RedirectResponse($this->generateUrl('tca_ref'));
    }


}

