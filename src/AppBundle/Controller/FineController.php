<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Cart;
use AppBundle\Entity\Fine;
use AppBundle\Entity\Transaction;

use Doctrine\Common\Persistence\ObjectManager;

class FineController extends Controller
{
   
    /**
     * @Route("amendes/{cart}", requirements={"cart":"\d+"}, name="fine_details")
     */
    public function cartAction(Request $request, Cart $cart)
    {
        $fineRepo = $this->getDoctrine()->getRepository('AppBundle:Fine');
        
        $fines = $fineRepo->findByCart($cart);
        $param = array(
                "fines" => $fines,
                );
        return $this->render('amendes/amende_details.html.twig',$param);
    }

    /**
     * @Route("transaction/{fine}", requirements={"fine":"\d+"}, name="transac_details")
     */
    public function transactionAction(Request $request, Fine $fine)
    {
        $fineRepo = $this->getDoctrine()->getRepository('AppBundle:Transaction');
        
        $transaction = $fineRepo->findOneByFine($fine);
        $param = array(
                "transaction" => $transaction,
                );
        return $this->render('transaction/transac_details.html.twig',$param);
    }    
    
    /**
     * @Route("payer/{fine}", requirements={"fine":"\d+"}, name="payment_action")
     */
    public function paymentAction(Request $request, Fine $fine)
    {
        //$this->em = $manager;
        $em = $this->getDoctrine()->getManager();
        $secret = 'gm3sygqerettmeqtwbyma7tye868mpv6zys4x6yk688dekbxkd29ubhgtfmpgmz6vaf8g5vgfesmzbgbfmkbkkuqftz6mdm2zs6dbyar28k4bx7b3sepbvnrm7wuxy74';
        $mid = '6nmet3c4zthdzb23f9y5z9awrzp7v7un';
        $ccn = '4485187294407276' ;
        $amo = '5599';
        $tim = time();
        $tim = $tim - 1000;
        $tmp = $secret . $mid . $ccn . $amo . $tim;
        $tok = hash("sha256", $tmp);
        $http = 'http://guillaume.zz.mu/bank/payment/create?ccn='.$ccn.'&cvv=123&exp=122017&amo='.$amo.'&cur=eur&mid='.$mid.'&tim='.$tim.'&tok='.$tok;
        
        
        $file = file_get_contents($http);
        $tab = array ();
        $tab = json_decode($file, true);
        $transaction_id = $tab['transaction_id'];
        $status = $tab['status'];
        $message = $tab['message'];
        
        $transaction = new transaction ();
        $transaction->setFine($fine);
        //$transaction->setDateCreated($faker->dateTimeBetween($fine->getDateCreated()));
        $transaction->setDateCreated($fine->getDateCreated());
        $transaction->setDateValidationBq($fine->getDateCreated());
        
        
        $transaction->setStatus($status);
        $transaction->setMessage($message);
        $transaction->setAmount($fine->getAmount());
        $transaction->setTransactionId($transaction_id);
        
        $fine->setStatus('Payée');
        $em->persist($transaction); 
        $em->persist($fine); 
        
        
        //$fineId = $fine->getId();
        
        $cartObj = $fine->getCart();
        $cartId = $cartObj->getId();
        $userObj = $cartObj->getUser();
        $userObj->setMyMoney($userObj->getMyMoney()-$fine->getAmount());
        //$userObj->setMyMoney(0);
        $em->persist($userObj);
                
        $em->flush();
        //$pickup_spot->setLatitude($tab['results'][0]['geometry']['location']['lat']);
        //$pickup_spot->setLongitude($tab['results'][0]['geometry']['location']['lng']);        
        
        //return $this->redirectToRoute("home");

        /*return $this->redirectToRoute("transac_details",
                array(
                        "fine" => $fineId
                    )
                );*/
        
        return $this->redirectToRoute("fine_details",
                array(
                        "cart" => $cartId
                    )
        );
        
        /*$fineRepo = $this->getDoctrine()->getRepository('AppBundle:Transaction');
        
        $transaction = $fineRepo->findOneByFine($fine);
        $param = array(
                "transaction" => $transaction,
                );
        return $this->render('transaction/transac_details.html.twig',$param);*/
    }        
    
    
//{{ path("fine_details", {"cart":cart.id}) }}    
    
}
