<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;

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
                return $this->redirect($this->generateUrl('home'));
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
            if($request->isXmlHttpRequest())
            {
                $em = $this->getDoctrine()->getEntityManager();

               $qb = $em->createQueryBuilder();

               $qb->delete('AppBundle:Cart','c')
                    ->where('c.id ='.$cartId);
                
                $query = $qb->getQuery();               
                $query->execute();
                
               return new Response();
            }
            
            
        }else{
                return $this->redirect($this->generateUrl('home'));
        }
    }
    
    
    
    /**
     * @Route("/confirmPanier/",name="confirmP")
     * @param User $user
     */
    public function confirmP($carts)
    {
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            
        }else{
                return $this->redirect($this->generateUrl('home'));
        }
    }
}
