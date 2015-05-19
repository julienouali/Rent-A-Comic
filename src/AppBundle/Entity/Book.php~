<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\BookRepository")
 */
class Book
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Serie", inversedBy="books")
     */
    private $serie;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RelBookAuthor", mappedBy="books")
     */
    private $rel;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Cart", inversedBy="books")
     */
    private $carts;


    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255,nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255)
     */
    private $cover;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbPage", type="integer",nullable=true)
     */
    private $nbPage;

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=255)
     */
    private $editor;

    /**
     * @var integer
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

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
     * @ORM\Column(name="datePublished", type="datetime",nullable=true)
     */
    private $datePublished;

    /**
     *  @var interger
     * 
     *  @ORM\Column(name="seriePosition", type="integer",nullable=true)
     */
    private $seriePosition;

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
     * Set Id
     * @param integer $id
     * @return Book
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Book
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set cover
     *
     * @param string $cover
     * @return Book
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set nbPage
     *
     * @param integer $nbPage
     * @return Book
     */
    public function setNbPage($nbPage)
    {
        $this->nbPage = $nbPage;

        return $this;
    }

    /**
     * Get nbPage
     *
     * @return integer 
     */
    public function getNbPage()
    {
        return $this->nbPage;
    }

    /**
     * Set editor
     *
     * @param string $editor
     * @return Book
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string 
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     * @return Book
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer 
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set idDessinateur
     *
     * @param integer $idDessinateur
     * @return Book
     */
    public function setIdDessinateur($idDessinateur)
    {
        $this->idDessinateur = $idDessinateur;

        return $this;
    }

    /**
     * Get idDessinateur
     *
     * @return integer 
     */
    public function getIdDessinateur()
    {
        return $this->idDessinateur;
    }

    /**
     * Set idColoriste
     *
     * @param integer $idColoriste
     * @return Book
     */
    public function setIdColoriste($idColoriste)
    {
        $this->idColoriste = $idColoriste;

        return $this;
    }

    /**
     * Get idColoriste
     *
     * @return integer 
     */
    public function getIdColoriste()
    {
        return $this->idColoriste;
    }

    /**
     * Set idScenariste
     *
     * @param integer $idScenariste
     * @return Book
     */
    public function setIdScenariste($idScenariste)
    {
        $this->idScenariste = $idScenariste;

        return $this;
    }

    /**
     * Get idScenariste
     *
     * @return integer 
     */
    public function getIdScenariste()
    {
        return $this->idScenariste;
    }

    /**
     * Set idSerie
     *
     * @param integer $idSerie
     * @return Book
     */
    public function setIdSerie($idSerie)
    {
        $this->idSerie = $idSerie;

        return $this;
    }

    /**
     * Get idSerie
     *
     * @return integer 
     */
    public function getIdSerie()
    {
        return $this->idSerie;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Book
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Book
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
     * @return Book
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
     * Set datePublished
     *
     * @param \DateTime $datePublished
     * @return Book
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    /**
     * Get datePublished
     *
     * @return \DateTime 
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * Set serie
     *
     * @param integer $serie
     * @return Book
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * Get serie
     *
     * @return integer 
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * Set rel
     *
     * @param integer $rel
     * @return Book
     */
    public function setRel($rel)
    {
        $this->rel = $rel;

        return $this;
    }

    /**
     * Get rel
     *
     * @return integer 
     */
    public function getRel()
    {
        return $this->rel;
    }

    /**
     * Set carts
     *
     * @param integer $carts
     * @return Book
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
     * Set seriePosition
     *
     * @param integer $seriePosition
     * @return Book
     */
    public function setSeriePosition($seriePosition)
    {
        $this->seriePosition = $seriePosition;

        return $this;
    }

    /**
     * Get seriePosition
     *
     * @return integer 
     */
    public function getSeriePosition()
    {
        return $this->seriePosition;
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
     * @return Book
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

    /**
     * Add rel
     *
     * @param \AppBundle\Entity\RelBookAuthor $rel
     * @return Book
     */
    public function addRel(\AppBundle\Entity\RelBookAuthor $rel)
    {
        $this->rel[] = $rel;

        return $this;
    }

    /**
     * Remove rel
     *
     * @param \AppBundle\Entity\RelBookAuthor $rel
     */
    public function removeRel(\AppBundle\Entity\RelBookAuthor $rel)
    {
        $this->rel->removeElement($rel);
    }
}
