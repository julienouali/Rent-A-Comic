<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relation_BookCart
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Relation_BookCartRepository")
 */
class Relation_BookCart
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
     * @ORM\Column(name="idBook", type="integer")
     */
    private $idBook;

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
     * Set idBook
     *
     * @param integer $idBook
     * @return Relation_BookCart
     */
    public function setIdBook($idBook)
    {
        $this->idBook = $idBook;

        return $this;
    }

    /**
     * Get idBook
     *
     * @return integer 
     */
    public function getIdBook()
    {
        return $this->idBook;
    }

    /**
     * Set idCart
     *
     * @param integer $idCart
     * @return Relation_BookCart
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
