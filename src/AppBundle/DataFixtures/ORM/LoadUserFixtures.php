<?php
namespace AppBundle\Controller;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAware;

use AppBundle\Entity\User;
use AppBundle\Entity\Cart;
use AppBundle\Entity\Fine;
use AppBundle\Entity\Transaction;

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
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 650, $max = 1550));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));
            $user->setCb('4485187294407276');
            $postalCodeArray = array();
            for ($l=75001; $l < 75021 ; $l++ ) {
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
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 850, $max = 1399));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));
            $user->setCb('4485187294407276');
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
            $user->setFirstName('Khouaji');
            $user->setLastName('Aymane');
            $user->setPassword('12345');
            $user->setEmail($faker->email);
            $user->setNickname('Odint');
            $user->setAddress('3 rue Foch');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 850, $max = 1399));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));            
            $user->setCb('4485187294407276');
            $user->setPostalCode('75016');            
            $encoder= $this->container->get("security.password_encoder");
            $encodedPassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encodedPassword);                        
            $slug = $this->container->get("cocur_slugify")->slugify($user->getFirstName().'-'.$user->getLastName() );
            $slug .= uniqid();
            $user->setSlug($slug);
            
            $manager->persist($user);             
            
            $user = new User();
            //$user->setRoles(array("ROLE_ADMIN"));
            $user->setFirstName('Ouali');
            $user->setLastName('Julien');
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname('test');
            $user->setAddress('33 rue Cambon');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 850, $max = 1399));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));            
            $user->setCb('4485187294407276');
            $user->setPostalCode('75001');            
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
            $user->setAddress('3 rue foch');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 850, $max = 1399));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));            
            $user->setCb('4485187294407276');
            $user->setPostalCode('75016');            
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
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);
            
            
            $user = new User();
            //$user->setRoles(array("ROLE_ADMIN"));
            $user->setFirstName('Barre');
            $user->setLastName('Raymond');
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname('R.Barre');
            $user->setAddress('3 rue foch');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 850, $max = 1399));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));            
            $user->setCb('4485187294407276');
            $user->setPostalCode('75016');            
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
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            array_push($tab, $books[2]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);                    
        
            $user = new User();
            $user->setFirstName('Laguiller');
            $user->setLastName('Arlette');
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname('A.Laguil');
            $user->setAddress('3 rue foch');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 850, $max = 1399));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));            
            $user->setCb('4485187294407276');
            $user->setPostalCode('75016');            
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
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            array_push($tab, $books[2]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);               
            
            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            array_push($tab, $books[2]);
            array_push($tab, $books[3]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);              
                       
             
            $user = new User();
            $user->setFirstName('Lang');
            $user->setLastName('Jack');
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname('J.Lang');
            $user->setAddress('3 rue foch');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 850, $max = 1399));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));            
            $user->setCb('4485187294407276');
            $user->setPostalCode('75016');            
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
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            array_push($tab, $books[2]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);               
            
            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            array_push($tab, $books[2]);
            array_push($tab, $books[3]);
            array_push($tab, $books[4]);
            array_push($tab, $books[5]);
            array_push($tab, $books[6]);
            array_push($tab, $books[7]);
            array_push($tab, $books[8]);
            array_push($tab, $books[9]);
            array_push($tab, $books[10]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);                
            
            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            $manager->persist($cart);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Endommagé');
            $fine->setStatus('Payée');
            $manager->persist($fine);
            
            $transaction = new transaction ();
            $transaction->setFine($fine);
            $transaction->setDateCreated($faker->dateTimeBetween($fine->getDateModified()));
            $transaction->setDateValidationBq($transaction->getDateCreated());
            $transaction->setStatus('payment_ok');
            $transaction->setMessage('Payment created');
            $transaction->setAmount($fine->getAmount());
            $transaction->setTransactionId('55506fad526f3');
            $manager->persist($transaction);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Retard');
            $fine->setStatus('Non payée');
            $manager->persist($fine);            

            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            $manager->persist($cart);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Endommagé');
            $fine->setStatus('Non payée');
            $manager->persist($fine);            
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Retard');
            $fine->setStatus('Payée');
            $manager->persist($fine);
            
            $transaction = new transaction ();
            $transaction->setFine($fine);
            $transaction->setDateCreated($faker->dateTimeBetween($fine->getDateModified()));
            $transaction->setDateValidationBq($transaction->getDateCreated());
            $transaction->setStatus('payment_ok');
            $transaction->setMessage('Payment created');
            $transaction->setAmount($fine->getAmount());
            $transaction->setTransactionId('55506fad526f4');
            $manager->persist($transaction);            
                    
//             
            
            $user = new User();
            $user->setFirstName('Raymond');
            $user->setLastName('Domenech');
            $user->setPassword('123');
            $user->setEmail($faker->email);
            $user->setNickname('R.Domene');
            $user->setAddress('3 rue foch');
            $user->setCity('Paris');
            $user->setTel($faker->phoneNumber);
            $user->setRoles(array("ROLE_ADMIN"));
            $user->setSubscriber(1);
            $user->setMyMoney($faker->randomFloat($nbMaxDecimals = 1, $min = 650, $max = 1550));
            $user->setLatitude($faker->randomFloat($nbMaxDecimals = 6, $min = 48.834540, $max = 48.883781));
            $user->setLongitude($faker->randomFloat($nbMaxDecimals = 6, $min = 2.296678, $max = 2.389375));            
            $user->setCb('4485187294407276');
            $user->setPostalCode('75016');            
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
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            array_push($tab, $books[2]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);               
            
            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            array_push($tab, $books[2]);
            array_push($tab, $books[3]);
            array_push($tab, $books[4]);
            array_push($tab, $books[5]);
            array_push($tab, $books[6]);
            array_push($tab, $books[7]);
            array_push($tab, $books[8]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            
            
            $manager->persist($cart);                
            
            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            $manager->persist($cart);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Endommagé');
            $fine->setStatus('Payée');
            $manager->persist($fine);
            
            $transaction = new transaction ();
            $transaction->setFine($fine);
            $transaction->setDateCreated($faker->dateTimeBetween($fine->getDateModified()));
            $transaction->setDateValidationBq($transaction->getDateCreated());
            $transaction->setStatus('payment_ok');
            $transaction->setMessage('Payment created');
            $transaction->setAmount($fine->getAmount());
            $transaction->setTransactionId('55506fad526f3');
            $manager->persist($transaction);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Retard');
            $fine->setStatus('Non payée');
            $manager->persist($fine);            

            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            $manager->persist($cart);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Endommagé');
            $fine->setStatus('Non payée');
            $manager->persist($fine);            
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Retard');
            $fine->setStatus('Payée');
            $manager->persist($fine);
            
            $transaction = new transaction ();
            $transaction->setFine($fine);
            $transaction->setDateCreated($faker->dateTimeBetween($fine->getDateModified()));
            $transaction->setDateValidationBq($transaction->getDateCreated());
            $transaction->setStatus('payment_ok');
            $transaction->setMessage('Payment created');
            $transaction->setAmount($fine->getAmount());
            $transaction->setTransactionId('55506fad526f4');
            $manager->persist($transaction);               

            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            $manager->persist($cart);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Endommagé');
            $fine->setStatus('Non payée');
            $manager->persist($fine);            
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Retard');
            $fine->setStatus('Payée');
            $manager->persist($fine);
            
            $transaction = new transaction ();
            $transaction->setFine($fine);
            $transaction->setDateCreated($faker->dateTimeBetween($fine->getDateModified()));
            $transaction->setDateValidationBq($transaction->getDateCreated());
            $transaction->setStatus('payment_ok');
            $transaction->setMessage('Payment created');
            $transaction->setAmount($fine->getAmount());
            $transaction->setTransactionId('55506fad526f4');
            $manager->persist($transaction);                           

            $cart = new cart();
            
            $cart->setUser($user);
            $cart->setDateCreated($faker->dateTimeBetween(" - 3 years "));
            $cart->setDateToBeReturn($faker->dateTimeThisMonth($max = 'now'));
            $cart->setDateReallyReturned($faker->dateTimeBetween($cart->getDateToBeReturn()));
            $cart->setDateModified($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $cart->setTotalAmont(25);
            $cart->setStatus('Retourné');
            
            $bookRepo = $this->container->get("doctrine")->getRepository("AppBundle:Book");
            $books = $bookRepo->findAll();
            shuffle($books);
            $tab = array ();
            array_push($tab, $books[1]);
            $cart->setBooks($tab);
            
            $pickupRepo = $this->container->get("doctrine")->getRepository("AppBundle:Pickupspot");
            $pickups = $pickupRepo->findAll();
            shuffle($pickups);
            //$tab = array ();
            //array_push($tab, );
            $cart->setPickup($pickups[1]);
            $manager->persist($cart);
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Endommagé');
            $fine->setStatus('Non payée');
            $manager->persist($fine);            
            
            $fine = new fine();
            $fine->setCart($cart);
            $fine->setDateCreated($faker->dateTimeBetween($cart->getDateReallyReturned()));
            $fine->setDateModified($faker->dateTimeBetween($fine->getDateCreated()));
            $fine->setDateLimit($faker->dateTimeBetween($fine->getDateModified()));
            $fine->setAmount($faker->randomFloat($nbMaxDecimals = 2, $min = 7, $max = 28));
            $fine->setMotif('Retard');
            $fine->setStatus('Payée');
            $manager->persist($fine);
            
            $transaction = new transaction ();
            $transaction->setFine($fine);
            $transaction->setDateCreated($faker->dateTimeBetween($fine->getDateModified()));
            $transaction->setDateValidationBq($transaction->getDateCreated());
            $transaction->setStatus('payment_ok');
            $transaction->setMessage('Payment created');
            $transaction->setAmount($fine->getAmount());
            $transaction->setTransactionId('55506fad526f4');
            $manager->persist($transaction);                           
            
            $manager->flush();
        /*echo $faker->name;*/

        //pour chaque user, créer plusieurs Story

        //pour chaque Story, créer quelques comment

    }

}