<?php

// ADMIN FUNCTIONS (all right)
// camp, refugee, stokc management

// route : /admin/*

namespace Tropi\CampsBundle\Controller;

// IMPORT OBJECT

// controller function
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// form object
use Tropi\CampsBundle\Form\RefugieType;
use Tropi\CampsBundle\Form\CampType;
use Tropi\CampsBundle\Form\ProduitType;
use Tropi\CampsBundle\Form\QuantiteType;

// entity object
use Tropi\CampsBundle\Entity\Refugie;
use Tropi\CampsBundle\Entity\Camp;
use Tropi\CampsBundle\Entity\Centrale;
use Tropi\CampsBundle\Entity\Produit;
use Tropi\CampsBundle\Entity\Quantite;

// returning functions
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;


#TROPICAMPS ADMIN FUNCTIONS

class StaffController extends Controller
{
    // route : /admin
    // display admin welcome page
    public function indexAction(){
        // just return index.html.twig from Staff folder
        // using layout.html.twig
        return $this->render('TropiCampsBundle:Staff:index.html.twig');
    }
    
    // route : /admin/refugie
    // display all refugee (and add new refugee to db)
    public function refAction(Request $request){
        // init new empty refugee object
        $refugie = new Refugie();
        
        // getting camp repository in order to collect refugie from db
        $repository = $this->getDoctrine()->getRepository('TropiCampsBundle:Refugie');
        // getting all object refugee (TropiCampsBundle:Refugie)
        $refugies = $repository->findAll();
        
        // create new form with empty refugee object >>> empty form
        $form = $this->createForm(new RefugieType(), $refugie,  array(
            // the form send data to this action : refAction
            // (tca_ref point this action)
            'action' => $this->generateUrl('tca_ref'),
            'method' => 'POST',
        ));
        
        // combine form and sent datas
        $form->handleRequest($request);
        // if request empty >>> nothing append
        // else request fill in the form and then fill in our refugee object

        // if fomr is valid (every data and good token)
        if ($form->isValid()){
            // get Entity Manager for write on db
            $em = $this->getDoctrine()->getManager();
            // persist refugee in Entity Manager
            $em->persist($refugie);
            // update db
            $em->flush();

            // return refugees page
            // parameter : 
            //      form : our previous form in template format
            //      refName : added refugee name's
            //      refugies : list of every refugees
            return $this->render('TropiCampsBundle:Staff:ref.html.twig', array('form' => $form->createView(),'refName' => $refugie->getNom(),'refugies' => $refugies));
        }
        // return the same result
        // withou refName
        //      template engine will understand
        //      missing refName >>> no success message
        return $this->render('TropiCampsBundle:Staff:ref.html.twig', array('form' => $form->createView(),'refugies' => $refugies));
    }
    
    // route : /admin/refugie/mod
    // modify existing refugee
    // get $id by parameters, id of refugee to modiy
    public function modRefAction($id){
        // get POST data
        $request = $this->get('request');
        
        // Entity Manager
        $em = $this->getDoctrine()->getEntityManager();
        // Find the refugee of id $id in db
        $refugie = $em->getRepository('TropiCampsBundle:Refugie')->find($id);
        
        // if refugee not found
        if(!isset($refugie)){
            // redirect client to list refugee page
            return new RedirectResponse($this->generateUrl('tca_ref'));
        }
        // create form with our refugee
        // >>> filled form
        $form = $this->createForm(new RefugieType(), $refugie,  array(
            // sending form to this action
        'action' => $this->generateUrl('tca_mod_refugie',array('id'=>$id)),
        'method' => 'POST',
        ));
        
        // Another method to valid and mix form (structure) and data (content)
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid())
            {
                $em->persist($refugie);
                $em->flush();
            }
        }
        // return filled form (twig format) and refugee to modify or modified
        return $this->render('TropiCampsBundle:Staff:refpage.html.twig', array('form' => $form->createView(),'refugie' => $refugie)); 
    }

    // route : /admin/refugie/del
    // delete refugee of id $id
    public function delRefAction($id){
        // same functions : get the refugee
         $em = $this->getDoctrine()->getEntityManager();
        $refugie = $em->getRepository('TropiCampsBundle:Refugie')->find($id);
        if(!isset($refugie)){
            return new RedirectResponse($this->generateUrl('tca_ref'));
        }
        
        // removing refugee from Entity Manager
        $em->remove($refugie);
        // updating
        $em->flush();
        
        // redirecting
    	return new RedirectResponse($this->generateUrl('tca_ref'));
    }

    // route : /admin/camp
    // get (and add new camp)
    public function campAction(Request $request){
        // same function, refer to refAction
        $camp = new Camp();

        $repository = $this->getDoctrine()->getRepository('TropiCampsBundle:Camp');
        $repositoryCentrale = $this->getDoctrine()->getRepository('TropiCampsBundle:Centrale');
        // get all camps
        $camps = $repository->findAll();
        
        // empty form sending to this adress
        $form = $this->createForm(new CampType(), $camp,  array(
            'action' => $this->generateUrl('tca_camp'),
            'method' => 'POST',
        ));
        $form->handleRequest($request);

        // checking form
        if ($form->isValid()){
            // get manually centraleId from form (refer to staff/camp.html.twig file)
            // and get centrale of id centraleId
            $centrale = $repositoryCentrale->find($form['centraleid']->getData());
            
            // adding centrale to camp to add
            $camp->setCentrale($centrale);
            $em = $this->getDoctrine()->getManager(); //Entity manager
            $em->persist($camp);
            // update db
            $em->flush();

            // if added, render the same page, with the new camp name
            return $this->render('TropiCampsBundle:Staff:camp.html.twig', array('form' => $form->createView(),'campName' => $camp->getName(),'camps' => $camps));
        }
        // return the form and all camps
        return $this->render('TropiCampsBundle:Staff:camp.html.twig', array('form' => $form->createView(),'camps' => $camps));
    }
    
    // route : /admin/{id}
    // display camp data with $id
    public function campPageAction($id){
        $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Camp');
        // find the good camp
        $camp = $repository->find($id);

        // if don't exist
        if (null === $camp) {
            // show not found
            throw new NotFoundHttpException("Le camp d'id ".$id." n'est pas dans notre base de données'.");
        }
        // return the camp data
        return $this->render('TropiCampsBundle:Staff:camppage.html.twig',array('camp' => $camp));
    }
    
    // route : /admin/stock
    // display all camp and add new product type
    public function stockAction(Request $request){
        // get all camps
        $repository = $this->getDoctrine()->getRepository('TropiCampsBundle:Camp');
        $camps = $repository->findAll();
        
        // get product form, pointing to this action
        $product = new Produit();
        $form = $this->createForm(new ProduitType(), $product,  array(
            'action' => $this->generateUrl('tca_stock'),
            'method' => 'POST',
        ));
        
        // if adding data >>> update db
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Entity manager
            $em->persist($product);
            $em->flush();
            return $this->render('TropiCampsBundle:Staff:stock.html.twig', array('form' => $form->createView(),'productName' => $product->getNom(),'camps' => $camps));
        }
        
        // just display camps and form
        return $this->render('TropiCampsBundle:Staff:stock.html.twig',array('form' => $form->createView(),'camps' => $camps));
    }
    
    // route : /admin/stock/{id}
    // display stock of camp of id $id
    public function stockPageAction($id){
        // get current camp
        $repository = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Camp');
        $camp = $repository->find($id);
        
        // get all products
        $products = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Produit')->findAll();

        // checking camp existing
        if (null === $camp) {
            throw new NotFoundHttpException("Le camp d'id ".$id." n'est pas dans notre base de données'.");
        }
        
        // twig will do the job
        // thanks to every getter defined in entity
        //      getQuantite (Camp entity), getProduit (Quantite entity)
        // and then show defined or undefined product for this camp
        return $this->render('TropiCampsBundle:Staff:stockpage.html.twig',array('camp' => $camp,'products' => $products));
        
    }
    
    // route : /admin/stock/{id}/{pid}/def
    // define undefined quantity and required quantity for a product of id $pid
    // and a camp of id $id
    public function stockDefAction(Request $request, $id,$pid){
        // get current
        $camp = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Camp')->find($id);
        // get current product (example: rice, water, drugs,...)
        $product = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Produit')->find($pid);
        
        // checking camp and product existing (wrong URL, modified $id value for example)
        if (null === $camp) {
            throw new NotFoundHttpException("Le camp d'id ".$id." n'est pas dans notre base de données'.");
        }
        if (null === $product) {
            throw new NotFoundHttpException("Le produit d'id ".$id." n'est pas dans notre base de données'.");
        }
        
        // new Quantity of $product for the camp $camp
        $qtt = new Quantite($camp,$product);
        
        // new form with false parameter for no disabled quantity required field
        // cause it have to be defined for the first time
        $form = $this->createForm(new QuantiteType(false), $qtt,  array(
            'action' => $this->generateUrl('tca_stock_def',array('id'=>$id,'pid'=>$pid)),
            'method' => 'POST',
        ));
        
        // checking form and update db with new quantity defined
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Entity manager
            $em->persist($qtt);
            $em->flush();
            // redirect to camp stock page
            return new RedirectResponse($this->generateUrl('tca_stock_page',array('id'=> $camp->getId() )));
        }
        return $this->render('TropiCampsBundle:Staff:stockdef.html.twig',array('form' => $form->createView()));
        
    }
    
    // route : /admin/stock/{id}/{pid}/add
    // update quantity value of a product $pid and a camp $id
    public function stockAddAction(Request $request, $id,$pid){
        // get the good camp and product
        $camp = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Camp')->find($id);
        $product = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Produit')->find($pid);
        // checking existing
        if (null === $camp) {
            throw new NotFoundHttpException("Le camp d'id ".$id." n'est pas dans notre base de données'.");
        }
        if (null === $product) {
            throw new NotFoundHttpException("Le produit d'id ".$id." n'est pas dans notre base de données'.");
        }
        
        // get corresponding quantity object
        $qtt = $this->getDoctrine()->getManager()->getRepository('TropiCampsBundle:Quantite')->findOneBy(array('camp'=>$camp,'produit'=>$product));
        
        // quantityType with true parameter
        // quantityRequired field have to be disabled, don't redefinable
        $form = $this->createForm(new QuantiteType(true), $qtt,  array(
            'action' => $this->generateUrl('tca_stock_add',array('id'=>$id,'pid'=>$pid)),
            'method' => 'POST',
        ));
        
        // update db with new quantity value and redirect to previous page
        $form->handleRequest($request);
        if ($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Entity manager
            $em->persist($qtt);
            $em->flush();
            return new RedirectResponse($this->generateUrl('tca_stock_page',array('id'=> $camp->getId())));
        }
        
        // return filled form, with defined values
        return $this->render('TropiCampsBundle:Staff:stockdef.html.twig',array('form' => $form->createView()));
        
    }
}

