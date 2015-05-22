<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\TransactionRepository")
 */
class Transaction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fine", inversedBy="transactions")
     */
    private $fine;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateValidationBq", type="datetime")
     */
    private $dateValidationBq;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var decimal
     *
     * @ORM\Column(name="amount", type="decimal", precision=9, scale=2, nullable=true)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="transactionId", type="string", length=255)
     */
    private $transactionId;

        /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255)
     */
    private $message;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Transaction
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateValidationBq
     *
     * @param \DateTime $dateValidationBq
     * @return Transaction
     */
    public function setDateValidationBq($dateValidationBq)
    {
        $this->dateValidationBq = $dateValidationBq;

        return $this;
    }

    /**
     * Get dateValidationBq
     *
     * @return \DateTime 
     */
    public function getDateValidationBq()
    {
        return $this->dateValidationBq;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Transaction
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set amont
     *
     * @param float $amont
     * @return Transaction
     */
    public function setAmont($amont)
    {
        $this->amont = $amont;

        return $this;
    }

    /**
     * Get amont
     *
     * @return float 
     */
    public function getAmont()
    {
        return $this->amont;
    }

    /**
     * Set rib
     *
     * @param string $rib
     * @return Transaction
     */
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return string 
     */
    public function getRib()
    {
        return $this->rib;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set transaction_id
     *
     * @param string $transactionId
     * @return Transaction
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * Get transaction_id
     *
     * @return string 
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Transaction
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set fine
     *
     * @param \AppBundle\Entity\Fine $fine
     * @return Transaction
     */
    public function setFine(\AppBundle\Entity\Fine $fine = null)
    {
        $this->fine = $fine;

        return $this;
    }

    /**
     * Get fine
     *
     * @return \AppBundle\Entity\Fine 
     */
    public function getFine()
    {
        return $this->fine;
    }
}
