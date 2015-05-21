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
     * @Route("catalogue/{page}", requirements={"catalogue/page":"\d+"}, defaults={"page":1}, name="catalogue")
     */
    public function catalogueAction($page)
    {
        $catRepo = $this->getDoctrine()->getRepository('AppBundle:Book');
        $relBookAuthorRepo = $this->getDoctrine()->getRepository('AppBundle:RelBookAuthor');
        $authorRepo = $this->getDoctrine()->getRepository('AppBundle:Author');
        
        $paginationResults = $catRepo->findPaginated($page);

        $param = array(
                "paginationResults" => $paginationResults,
                );
        
        return $this->render('catalogue/catalogue.html.twig',$param);
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
