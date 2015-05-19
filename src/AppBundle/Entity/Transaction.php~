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
     * @var float
     *
     * @ORM\Column(name="amont", type="float")
     */
    private $amont;

    /**
     * @var string
     *
     * @ORM\Column(name="rib", type="string", length=255)
     */
    private $rib;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCart", type="integer")
     */
    private $idCart;


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
     * Set idCart
     *
     * @param integer $idCart
     * @return Transaction
     */
    public function setIdCart($idCart)
    {
        $this->idCart = $idCart;

        return $this;
    }

    /**
     * Get idCart
     *
     * @return integer 
     */
    public function getIdCart()
    {
        return $this->idCart;
    }
}
