<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\CartRepository")
 */
class Cart
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
     * @ORM\Column(name="dateModified", type="datetime")
     */
    private $dateModified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var float
     *
     * @ORM\Column(name="totalAmont", type="float")
     */
    private $totalAmont;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateToBeReturn", type="datetime")
     */
    private $dateToBeReturn;

    /**
     * @var integer
     *
     * @ORM\Column(name="idPickup", type="integer")
     */
    private $idPickup;


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
     * Set dateModified
     *
     * @param \DateTime $dateModified
     * @return Cart
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Cart
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
     * Set idUser
     *
     * @param integer $idUser
     * @return Cart
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Cart
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
     * Set totalAmont
     *
     * @param float $totalAmont
     * @return Cart
     */
    public function setTotalAmont($totalAmont)
    {
        $this->totalAmont = $totalAmont;

        return $this;
    }

    /**
     * Get totalAmont
     *
     * @return float 
     */
    public function getTotalAmont()
    {
        return $this->totalAmont;
    }

    /**
     * Set dateToBeReturn
     *
     * @param \DateTime $dateToBeReturn
     * @return Cart
     */
    public function setDateToBeReturn($dateToBeReturn)
    {
        $this->dateToBeReturn = $dateToBeReturn;

        return $this;
    }

    /**
     * Get dateToBeReturn
     *
     * @return \DateTime 
     */
    public function getDateToBeReturn()
    {
        return $this->dateToBeReturn;
    }

    /**
     * Set idPickup
     *
     * @param integer $idPickup
     * @return Cart
     */
    public function setIdPickup($idPickup)
    {
        $this->idPickup = $idPickup;

        return $this;
    }

    /**
     * Get idPickup
     *
     * @return integer 
     */
    public function getIdPickup()
    {
        return $this->idPickup;
    }
}
