<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        return $this->render('catalogue/catalogue.html.twig');
    }
    
    /**
     * @Route("panier",name="panier")
     * @return type
     */
    public function panierAction()
    {
      return $this->render('panier/panier.html.twig');  
    }
    
}
