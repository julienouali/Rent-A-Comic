<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\ORM\EntityManager;

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
             
                $cart = new Cart();
                $commandBook = $bookRepo->findOneBySlug($slug);
                
                $cart->addBook($commandBook);
                $cart->setUser($this->getUser());
                $cart->setDateCreated(new \DateTime());
                $cart->setDateModified(new \DateTime());
                $cart->setStatus('En Cours de Commande');
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($cart);
                $em->flush();
                
                $bookRepo->decrementQte($commandBook);
                
                 return $this->redirect($this->generateUrl('panier'));; 
            }else{
                return $this->redirect($this->generateUrl('home'));
            }
        
       
    }
}
