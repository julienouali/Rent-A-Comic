<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FineController extends Controller
{
    /**
     * @Route("/t", name="homet")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("amendes/{cart}", requirements={"cart":"\d+"}, name="fine_details")
     */
    public function catalogueAction(Request $request, $cart)
    {
        $fineRepo = $this->getDoctrine()->getRepository('AppBundle:Fine');
        //$relBookAuthorRepo = $this->getDoctrine()->getRepository('AppBundle:RelBookAuthor');
        //$authorRepo = $this->getDoctrine()->getRepository('AppBundle:Author');
        
        //$paginationResults = $catRepo->findPaginated($page);

        /*$param = array(
                "paginationResults" => $paginationResults,
                );*/
        return $this->render('amendes/amende_details.html.twig');
        //return $this->render('amendes/amende_details.html.twig',$param);
    }
    
    
}
