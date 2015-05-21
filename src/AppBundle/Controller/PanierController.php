<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Doctrine\ORM\EntityManager;


class PanierController extends Controller
{
    /**
     * @Route("/AjoutPanier/{slug}",name="ajoutP")
     */
    public function AjoutP($slug)
    {
        
    }
}
