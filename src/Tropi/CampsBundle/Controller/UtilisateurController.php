<?php

namespace Tropi\CampsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Form\CampType;
use Tropi\CampsBundle\Entity\Refugie;
use Tropi\CampsBundle\Entity\Camp;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UtilisateurController extends Controller
{
	// tc_homepage
    public function indexAction(){
        $refugie = new Refugie();
        
        $repository = $this->getDoctrine()->getRepository('TropiCampsBundle:Refugie');
        
        $form = $this->createForm(new RefugieType(), $refugie,  array(
            'action' => $this->generateUrl('tc_recherche'),
            'method' => 'POST',
        ));

        $camps = $this->getDoctrine()->getRepository('TropiCampsBundle:Camp')->findAll();
        
        return $this->render('TropiCampsBundle:Public:index.html.twig', array('form' => $form->createView(),'camps' => $camps));
    }

    //tc_refugie
    public function refugieAction($id){
        $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Refugie');
        $refugie = $repository->find($id);

        if (null === $refugie) {
            throw new NotFoundHttpException("Le refugie d'id ".$id." n'est pas dans notre base de données'.");
        }
    	
        return $this->render('TropiCampsBundle:Public:refpage.html.twig',array('refugie' => $refugie));
    }

    //tc_camp:
    public function campAction($id){
        $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Camp');
        $camp = $repository->find($id);

        if (null === $camp) {
            throw new NotFoundHttpException("Le camp d'id ".$id." n'existe pas.");
        }

        return $this->render('TropiCampsBundle:Public:camppage.html.twig',array('camp' => $camp));
    }

    //tc_recherche:
    public function rechercheAction(Request $request){
        
        if ($request->getMethod() == 'POST')
        {
            $refugieRech = new Refugie();

            $form = $this->createForm(new RefugieType(), $refugieRech);
            $form->handleRequest($request);

            if ($form->isValid()){
                $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Refugie');
                $refugieList = $repository->findAll();
                $l = count($refugieList);
                $refugieListS = array();
                foreach($refugieList as $key => $refugie)
                {
                    $match = 0;
                    if($refugieRech->getNom() == $refugie->getNom() && $refugieRech->getNom()){
                        $match += $l;
                    }
                    if($refugieRech->getPrenom() == $refugie->getPrenom() && $refugieRech->getPrenom()){
                        $match += $l;
                    }
                    if($refugieRech->getCheveux() == $refugie->getCheveux()){
                        $match += $l;
                    }
                    if($refugieRech->getYeux() == $refugie->getYeux()){
                        $match += $l;
                    }
                    if($refugieRech->getPaysOrigine() == $refugie->getPaysOrigine()){
                        $match += $l;
                    }
                    if($refugieRech->getVilleOrigine() == $refugie->getVilleOrigine() && $refugieRech->getVilleOrigine()){
                        $match += $l;
                    }
                    if($refugieRech->getCamp() == $refugie->getCamp() && $refugie->getCamp()){
                        $match += $l;
                    }
                    if($refugieRech->getTaille() >= $refugie->getTaille() - 5 &&
                      $refugieRech->getTaille() <= $refugie->getTaille() + 5 ){
                        $match += $l;
                    }
                    if($refugieRech->getPoids() >= $refugie->getPoids() - 15 &&
                      $refugieRech->getPoids() <= $refugie->getPoids() + 15 ){
                        $match += $l;
                    }
                    if($refugieRech->getAge() >= $refugie->getAge() - 5 &&
                      $refugieRech->getAge() <= $refugie->getAge() + 5 ){
                        $match += $l;
                    }
                    if($match != 0){
                        $match += $key;
                        $refugieListS[$match] = $refugie;
                    }
                    ksort($refugieList);
                }
            }
                
            return $this->render('TropiCampsBundle:Public:result.html.twig',array('refugieList' => $refugieListS));
        }
        return new RedirectResponse($this->generateUrl('tc_homepage'));
    }
//tc_recherche:
    public function exRechercheAction(Request $request){
        
        if ($request->getMethod() == 'POST')
        {
            $nom_objet_recherche = $this->get('request')->request->get('nom_objet_recherche');
            $pays_recherche = $this->get('request')->request->get('pays_recherche');
            if(!$nom_objet_recherche)
            {
                return $this->redirect($this->generateUrl('tc_homepage'));
            };
            $stab = explode(" ",$nom_objet_recherche);
            $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Refugie');
            $refugieList = $repository->findBy(array('paysOrigine' => $pays_recherche));
            $refugieListS = array();
            foreach($refugieList as $refugie)
            {
                $match = false;
                $nom = $refugie->getNom();
                $prenom = $refugie->getPrenom();
                foreach($stab as $word)
                {
                    if($word == $nom || $word == $prenom){
                        $match = true;
                    }
                }
                if($match){
                    array_push($refugieListS, $refugie);
                }
            }
            $ref = new Refugie();
            
            return $this->render('TropiCampsBundle:Public:result.html.twig',array('refugieList' => $refugieListS));
        }
        return new RedirectResponse($this->generateUrl('tc_homepage'));
    }


}

