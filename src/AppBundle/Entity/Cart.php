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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Book", inversedBy="carts")
     */
    private $books;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="carts")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PickupSpot", inversedBy="carts")
     */
    private $pickup;    

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Fine", mappedBy="cart")
     */
    private $fines;        

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
     * @var \DateTime
     *
     * @ORM\Column(name="dateReallyReturned", type="datetime", nullable=true)
     */
    private $dateReallyReturned;    

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
     * Set books
     *
     * @param integer $books
     * @return Cart
     */
    public function setBooks($books)
    {
        $this->books = $books;

        return $this;
    }

    /**
     * Get books
     *
     * @return integer 
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return Cart
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set pickup
     *
     * @param integer $pickup
     * @return Cart
     */
    public function setPickup($pickup)
    {
        $this->pickup = $pickup;

        return $this;
    }

    /**
     * Get pickup
     *
     * @return integer 
     */
    public function getPickup()
    {
        return $this->pickup;
    }

    /**
     * Set fines
     *
     * @param integer $fines
     * @return Cart
     */
    public function setFines($fines)
    {
        $this->fines = $fines;

        return $this;
    }

    /**
     * Get fines
     *
     * @return integer 
     */
    public function getFines()
    {
        return $this->fines;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->books = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fines = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add books
     *
     * @param \AppBundle\Entity\Book $books
     * @return Cart
     */
    public function addBook(\AppBundle\Entity\Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param \AppBundle\Entity\Book $books
     */
    public function removeBook(\AppBundle\Entity\Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Add fines
     *
     * @param \AppBundle\Entity\Fine $fines
     * @return Cart
     */
    public function addFine(\AppBundle\Entity\Fine $fines)
    {
        $this->fines[] = $fines;

        return $this;
    }

    /**
     * Remove fines
     *
     * @param \AppBundle\Entity\Fine $fines
     */
    public function removeFine(\AppBundle\Entity\Fine $fines)
    {
        $this->fines->removeElement($fines);
    }

    /**
     * Set dateReallyReturned
     *
     * @param \DateTime $dateReallyReturned
     * @return Cart
     */
    public function setDateReallyReturned($dateReallyReturned)
    {
        $this->dateReallyReturned = $dateReallyReturned;

        return $this;
    }

    /**
     * Get dateReallyReturned
     *
     * @return \DateTime 
     */
    public function getDateReallyReturned()
    {
        return $this->dateReallyReturned;
    }
}
