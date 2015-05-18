<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pickup_spot
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Pickup_spotRepository")
 */
class Pickup_spot
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
     * @ORM\Column(name="carts", type="integer")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Cart", mappedBy="pickup")
     */
    private $carts;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

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
     * Set address
     *
     * @param string $address
     * @return Pickup_spot
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Pickup_spot
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set idCart
     *
     * @param integer $idCart
     * @return Pickup_spot
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
     * Set carts
     *
     * @param integer $carts
     * @return Pickup_spot
     */
    public function setCarts($carts)
    {
        $this->carts = $carts;

        return $this;
    }

    /**
     * Get carts
     *
     * @return integer 
     */
    public function getCarts()
    {
        return $this->carts;
    }
}
