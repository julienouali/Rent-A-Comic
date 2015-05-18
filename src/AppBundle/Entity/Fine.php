<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fine
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FineRepository")
 */
class Fine
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
     * @var integer
     *
     * @ORM\Column(name="cart", type="integer")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cart", inversedBy="fines")
     */
    private $cart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModified", type="datetime")
     */
    private $dateModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateLimit", type="datetime")
     */
    private $dateLimit;

    /**
     * @var float
     *
     * @ORM\Column(name="amont", type="float")
     */
    private $amont;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255)
     */
    private $motif;

    /**
     * @var integer
     *
     * @ORM\Column(name="idCart", type="integer")
     */
    private $idCart;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;


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
     * @return Fine
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
     * Set dateModified
     *
     * @param \DateTime $dateModified
     * @return Fine
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;

        return $this;
    }

    /**
     * Get dateModified
     *
     * @return \DateTime 
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Set dateLimit
     *
     * @param \DateTime $dateLimit
     * @return Fine
     */
    public function setDateLimit($dateLimit)
    {
        $this->dateLimit = $dateLimit;

        return $this;
    }

    /**
     * Get dateLimit
     *
     * @return \DateTime 
     */
    public function getDateLimit()
    {
        return $this->dateLimit;
    }

    /**
     * Set amont
     *
     * @param float $amont
     * @return Fine
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
     * Set motif
     *
     * @param string $motif
     * @return Fine
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string 
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set idCart
     *
     * @param integer $idCart
     * @return Fine
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

    /**
     * Set status
     *
     * @param string $status
     * @return Fine
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
     * Set cart
     *
     * @param integer $cart
     * @return Fine
     */
    public function setCart($cart)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return integer 
     */
    public function getCart()
    {
        return $this->cart;
    }
}
