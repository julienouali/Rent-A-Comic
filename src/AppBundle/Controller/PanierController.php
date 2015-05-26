<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;
use AppBundle\Entity\Cart;


class PanierController extends Controller
{
    /**
     * @Route("/AjoutPanier/{slug}",name="ajoutP")
     */
    public function AjoutP($slug)
    {
         if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
                
                $bookRepo = $this->getDoctrine()->getRepository('AppBundle:Book');
                $cartRepo = $this->getDoctrine()->getRepository('AppBundle:Cart');
                
                $cart = $cartRepo->findCartEnCourByUser($this->getUser());
                if(!$cart){
                    $cart = new Cart();
                    $cart->setUser($this->getUser());
                    $cart->setDateCreated(new \DateTime());
                    $cart->setDateModified(new \DateTime());
                    
                    $date2WeekLater = new \DateTime();
                    $date2WeekLater = $date2WeekLater->add(new \DateInterval('P14D'));
                    $cart->setDateToBeReturn($date2WeekLater);
                    $cart->setStatus('En Cours de Commande');
                }else{
                    $cart = $cartRepo->findCartEnCourByUser($this->getUser())[0];
                }
                
                $commandBook = $bookRepo->findOneBySlug($slug);
                $cart->addBook($commandBook);
                $em = $this->getDoctrine()->getManager();
                $em->persist($cart);
                $em->flush();
                
                $bookRepo->decrementQte($commandBook);
                
                 return $this->redirect($this->generateUrl('panier'));; 
            }else{
                return $this->redirect($this->generateUrl('login_route'));
            }
    }
    
    /**
     * @Route("/supprimer/",name="supprimer")
     */
    public function supprimerP()
    {
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $request = $this->get('request');
            $cartId = $request->request->get('cartId');
            $bookId = $request->request->get('bookId');
            
            if($request->isXmlHttpRequest())
            {
                $bookRepo = $this->getDoctrine()->getRepository('AppBundle:Book');
                $cartRepo = $this->getDoctrine()->getRepository('AppBundle:Cart');
                
                $cart = $cartRepo->findOneById($cartId);
                $book = $bookRepo->findOneById($bookId);
                $cart->removeBook($book);
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($cart);
                $em->flush();
                
                $bookRepo->incrementQte($book);
                
               return new Response();
            }
            
            
        }else{
                return $this->redirect($this->generateUrl('login_route'));
        }
    }
    
    
    
    /**
     * @Route("/confirmPanier/{cartId}",name="confirmP")
     * @param Cart $carts
     */
    public function confirmP(Request $request,$cartId)
    {
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            
            $pickUpSpotRepo = $this->getDoctrine()->getRepository('AppBundle:PickupSpot');
            
            $lesPickupSpots = $pickUpSpotRepo->findAll();
            
            $param = array("pickSpots"=>$lesPickupSpots);
            
            return $this->render('panier/confirmP.html.twig',$param);
        }else{
                return $this->redirect($this->generateUrl('home'));
        }
    }
}
