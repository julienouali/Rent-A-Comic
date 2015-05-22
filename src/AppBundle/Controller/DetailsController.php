<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DetailsController extends Controller
{
    /**
     * @Route("/details", name="details")
     */
    public function detailsAction()
    {
        return $this->render('details/details.html.twig');
    }    
}