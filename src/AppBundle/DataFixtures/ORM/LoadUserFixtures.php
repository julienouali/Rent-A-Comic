<?php
namespace AppBundle\Controller;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAware;

use AppBundle\Entity\User;
use AppBundle\Entity\Cart;
//use AppBundle\Entity\Story;
//use AppBundle\Entity\Comment;
use Symfony\Component\Security\Core\Util\SecureRandom;

use Symfony\Component\HttpFoundation\Request;

class DevDataFixtures extends ContainerAware implements FixtureInterface
//class DevDataFixtures implements FixtureInterface
{

    private $em;
    private $faker;

    public function load(ObjectManager $manager)
    {
        /*private $this->em = $manager;*/
        $this->em = $manager;
        $faker = \Faker\Factory::create();
        /*$faker = \Faker\Factory::create("fr_FR");*/
        /*$faker = \Faker\Factory::create("ja_JP");*/
        
        /*$this->faker = \Faker\Factory::create();*/
        //en boucle, crééer quelques User
        for ($i=0; $i < 10 ; $i++) { 
            $user = new User();
            //$user->setRoles(array("ROLE_ADMIN"));
            $user->setFirstName($faker->firstName);
            $user->setLastName($faker->lastName);
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname($faker->userName);
            $user->setAddress($faker->address);
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber($faker->boolean($chanceOfGettingTrue = 85));
            $postalCodeArray = array();
            for ($l=75000; $l < 75021 ; $l++ ) {
                array_push($postalCodeArray, $l);
            }
            shuffle($postalCodeArray);
            $user->setPostalCode($postalCodeArray[0]);
            //$cryptedpass = password_hash($user->getPassword(), PASSWORD_BCRYPT);
            //$user->setPassword($cryptedpass);
            
            $encoder= $this->container->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);                        
            
            $slug = $this->container->get("cocur_slugify")->slugify($user->getFirstName().'-'.$user->getLastName() );
            $slug .= uniqid();
            $user->setSlug($slug);
            
            //$generator = new SecureRandom();
            //$salt = bin2hex($generator->nextBytes(50));
            //$token = bin2hex($generator->nextBytes(50));

            //$user->setSalt($salt);
            //$user->setToken($token);

            //$user->setDateRegistered($faker->dateTimeBetween(" - 3 years "));
            /*$user->setDateRegistered( new \DateTime());*/
            //$user->setDateModified( new \DateTime());
            /*$user->setDateLastLogin( new \DateTime());

            $encoder= $this->container->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);*/
            $manager->persist($user);            
        }

            $user = new User();
            //$user->setRoles(array("ROLE_ADMIN"));
            $user->setFirstName('Chirac');
            $user->setLastName('Jacques');
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname('J.Chirac');
            $user->setAddress('3 Quai Voltaire');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setPostalCode('75007');            
            $encoder= $this->container->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);                        
            $slug = $this->container->get("cocur_slugify")->slugify($user->getFirstName().'-'.$user->getLastName() );
            $slug .= uniqid();
            $user->setSlug($slug);
            
            $manager->persist($user);          
            
            $user = new User();
            //$user->setRoles(array("ROLE_ADMIN"));
            $user->setFirstName('Jospin');
            $user->setLastName('Lionel');
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname('L.Jospin');
            $user->setAddress('3 Quai Voltaire');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setPostalCode('75007');            
            $encoder= $this->container->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);                        
            $slug = $this->container->get("cocur_slugify")->slugify($user->getFirstName().'-'.$user->getLastName() );
            $slug .= uniqid();
            $user->setSlug($slug);
            
            $manager->persist($user);
            
            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Returned');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            
            //foreach ($books as $book) {
            
            //echo $book->getTitle();
            //}
            //dump(count($books));
            //dump($books);
            //shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            
            $manager->persist($cart);
            
            
                    
        
            

        $manager->flush();
        /*echo $faker->name;*/

        //pour chaque user, créer plusieurs Story

        //pour chaque Story, créer quelques comment

    }

}