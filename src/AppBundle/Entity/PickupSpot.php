<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pickup_spot
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PickupspotRepository")
 */
class PickupSpot
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
     * @var decimal
     *
     * @ORM\Column(name="latitude", type="decimal", precision=9, scale=7, nullable=true)
     */
    private $latitude;       
    
    /**
     * @var decimal
     *
     * @ORM\Column(name="longitude", type="decimal", precision=9, scale=7, nullable=true)
     */
    private $longitude;      
    
    /**
     * @var string
     *
     * @ORM\Column(name="storeName", type="string", length=255)
     */
    private $storeName;   
    
    /**
     * @var integer
     *
     * @ORM\Column(name="postalCode", type="integer")
     */
    private $postalCode;    

    /**
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

    /**
     * Set postalCode
     *
     * @param integer $postalCode
     * @return Pickup_spot
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return integer 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set storeName
     *
     * @param string $storeName
     * @return Pickup_spot
     */
    public function setStoreName($storeName)
    {
        $this->storeName = $storeName;

        return $this;
    }

    /**
     * Get storeName
     *
     * @return string 
     */
    public function getStoreName()
    {
        return $this->storeName;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Pickup_spot
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Pickup_spot
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add carts
     *
     * @param \AppBundle\Entity\Cart $carts
     * @return Pickup_spot
     */
    public function addCart(\AppBundle\Entity\Cart $carts)
    {
        $this->carts[] = $carts;

        return $this;
    }

    /**
     * Remove carts
     *
     * @param \AppBundle\Entity\Cart $carts
     */
    public function removeCart(\AppBundle\Entity\Cart $carts)
    {
        $this->carts->removeElement($carts);
    }
}
