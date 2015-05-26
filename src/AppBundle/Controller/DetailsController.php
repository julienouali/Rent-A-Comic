<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Book;

class DetailsController extends Controller
{
    /**
     * @Route("/details/{slug}", name="details")
     */
    public function detailsAction(Request $request, $slug)
    {
        $bookRepo = $this->get("doctrine")->getRepository("AppBundle:Book");
        $book = $bookRepo->findOneBySlug($slug);

        if(!$book){
            throw new createNotFoundException("Oups ! Désolé gamin...");            
        }
        
        $params = array(
            "bd" => $book
        );
        
        return $this->render('details/details.html.twig', $params);
    }    
}