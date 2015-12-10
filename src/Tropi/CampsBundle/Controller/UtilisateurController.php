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
    public function rechercheAction(Request $request){
/*
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


    	return response;*/
        if ($request->getMethod() == 'POST')
        {
            $nom_objet_recherche = $this->get('request')->request->get('nom_objet_recherche');
            if(!$nom_objet_recherche)
            {
                return $this->redirect($this->generateUrl('tc_homepage'));
            };
            $stab = explode(" ",$nom_objet_recherche);
            $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Refugie');
            $refugieList = $repository->findBy(array(), array('id' => 'DESC'));
            $refugieListS = array();
            foreach($refugieList as $refugie)
            {
                $refug = false;
                foreach($stab as $word)
                {
                    $nom = $refugie->getNom();
                    $tabNom = explode(" ",$name);
                    foreach($tabNom as $n)
                    {
                        if(strcasecmp($word,$n) == 0)
                        {
                            $refug = true;
                        }
                    }
                    $prenom = $refugie->getPrenom();
                    $tprenom = explode(" ",$prenom);
                    foreach($tprenom as $p)
                    {
                        if(strcasecmp($word,$p) == 0)
                        {
                            $refug = true;
                        }
                    }
                }                
                if($refug)
                {
                    array_push($refugieListS, $refugie);
                }
            }
            if(empty($refugieListS))
            {
                $result = 'Aucun résultat pour "'.$nom_objet_recherche.'"';
            }
            else
            {
                $result= 'Résultat pour "'.$nom_objet_recherche.'"';
            }
            $ref = new Refugie();
            $type = $ref->getPaysOrigine(); 
            
            return $this->render('TropiCampsBundle:Public:index.html.twig',array('refugieList' => $refugieListS, 'pays' => $pays, 'result' => $result, 'currentType' => ''));
        }
        return new RedirectResponse($this->generateUrl('tc_homepage'));
    }


}

