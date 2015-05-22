<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Util\SecureRandom;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class UserController extends Controller
{
    
    /**
     * @Route("/profil/{slug}", requirements={"slug":"[a-z0-9-]+"}, name="user_details")
     */
    public function userDetailsAction(\Symfony\Component\HttpFoundation\Request $request, $slug )
    {
        $userRepo = $this->get("doctrine")->getRepository("AppBundle:User");
        //$commentsRepo = $this->get("doctrine")->getRepository("AppBundle:Comment");

        /*$story = $storyRepo->find($id);*/
        $user = $userRepo->findOneBySlug($slug);
        //pour page 404
        if (!$user) {
            throw $this->createNotFoundException("Hey merde!");
        }

        //$comment = new Comment();
        //$commentForm = $this->createForm(new CommentType, $comment);
        //$commentForm->handleRequest($request);
        //if ($commentForm->isValid()){
            /*$comment->setDateCreated(new \DateTime());
            $comment->setDateModified(new \DateTime());
            $comment->setStory($story);
            $em = $this->get("doctrine")->getManager();
            $em->persist($comment);
            $em->flush();*/

            //envoie un email à l'auteur de l'article
        //}
        // recupere les commentaires
        /*$comments = $commentsRepo->findByStory($story);*/
        /*$comments = $commentsRepo->findBy(array("story"=>$story));*/

        $params = array (
            "user" => $user
            //"commentForm" => $commentForm->createView()
            /*"comments" => $comments*/
        );
        //pour envoyer email
        //$this->indexAction('jp');

        return $this->render('user/user_details.html.twig',$params);
        
    }
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
                $user->setCity('Paris');
            }else{
               $FormError =  new \Symfony\Component\Form\FormError('IL FAUT ETRE PARISIENS POUR ACCEDER A CE SERVICE');
               $FormError->setOrigin($createUserForm);
               $createUserForm->addError($FormError);
                $param = array(
                        "createUserForm" =>$createUserForm->createView(),
                );
                return $this->render('user/inscription.html.twig',$param);
            }
            
            $slug = $this->get('cocur_slugify')->slugify($user->getFirstName().'-'.$user->getLastName());
            $user->setSlug($slug.uniqid());
            // JP : pour l'instant aleatoire
            $faker = \Faker\Factory::create();
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 7, $max = 5035));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));
            $user->setCb('4485187294407276');
            //$cryptedpass = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            //$user->setPassword($cryptedpass);
            
            
            $user->setRoles(array("ROLE_ADMIN"));
            
            $encoder= $this->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);            
            
            $em = $this->get('doctrine')->getManager();
                $em->persist($user);
                $em->flush();
        
                //log user
                $token = new UsernamePasswordToken($user, null, "main", $user->getRoles());
                $this->get("security.context")->setToken($token); //now the user is logged in

                //now dispatch the login event
                $request = $this->get("request");
                $event = new InteractiveLoginEvent($request, $token);
                $this->get("event_dispatcher")->dispatch("security.interactive_login", $event);
                
                //redirige sur accueil
                
            return $this->redirectToRoute("catalogue");                
            }
        
        
        $param = array(
            "createUserForm" =>$createUserForm->createView(),
            "FormError" => $createUserForm->getErrors()
        );
        

        
        return $this->render('user/inscription.html.twig',$param);
    }
    
     /**
     * @Route("/login",
     * name = "login_route")
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
