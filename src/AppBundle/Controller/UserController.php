<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Util\SecureRandom;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;

class UserController extends Controller
{
    /**
     * @Route("Inscription" , name="inscription")
     */
    public function Inscription(Request $request)
    {
        $user = new User();
        
        $createUserForm = $this->createForm(new UserType(),$user);
        
        $createUserForm->handleRequest($request);
        
        if($createUserForm->isValid())
        {
            $user->setSubscriber(TRUE);
            if($user->getPostalCode()[0].$user->getPostalCode()[1] == '75'){
                $user->setCity('PARIS');
            }else{
               $FormError =  new \Symfony\Component\Form\FormError('IL FAUT ETRE PARISIENS POUR ACCEDER A CE SERVICE');
               $FormError->setOrigin($createUserForm);
               $createUserForm->addError($FormError);
                $param = array(
                        "createUserForm" =>$createUserForm->createView(),
                );
        
                return $this->render('user/inscription.html.twig',$param);
            }
            
            $slug = $this->get('cocur_slugify')->slugify($user->getFirstName().$user->getLastName());
            $user->setSlug($slug);
            
            $em = $this->get('doctrine')->getManager();
                $em->persist($user);
                $em->flush();
        }
        
        
        $param = array(
            "createUserForm" =>$createUserForm->createView(),
            "FormError" => $createUserForm->getErrors()
        );
        
        return $this->render('user/inscription.html.twig',$param);
    }
    
     /**
     * @Route("/login",
     * name = "login")
     */
    public function loginFormAction(Request $request){
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'user/login_user.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }
    
    
     /**
     * @Route ("/login_check",
     * name = "login_check")
     */
    public function loginCheckAction(){}
    
    /**
     * @Route ("/logout",
     * name = "logout")
     */
    public function logoutAction(){}
}
