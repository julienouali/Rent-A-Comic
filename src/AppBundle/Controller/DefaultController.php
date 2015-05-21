<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\ORM\EntityManager;

use AppBundle\Entity\BookRepository;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("catalogue" , name="catalogue")
     */
    public function catalogueAction()
    {
        $catRepo = $this->getDoctrine()->getRepository('AppBundle:Book');
        $relBookAuthorRepo = $this->getDoctrine()->getRepository('AppBundle:RelBookAuthor');
        $authorRepo = $this->getDoctrine()->getRepository('AppBundle:Author');

        $param = array("lesBds" =>$catRepo->findAllBook(),
                        );
        
        return $this->render('catalogue/catalogue.html.twig',$param);
    }
    
    /**
     * @Route("panier",name="panier")
     * @return type
     */
    public function panierAction()
    {
        if ($this->get('security.context')->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {
            $cartRepo = $this->getDoctrine()->getRepository('AppBundle:Cart');
            
            
            $param = array('carts'=> $cartRepo->findByUser($this->getUser())
                            );
            
            return $this->render('panier/panier.html.twig',$param);  
            
        }else{
            return $this->redirect($this->generateUrl('home'));
        }
        
        
        
        
        
    }
    
}
