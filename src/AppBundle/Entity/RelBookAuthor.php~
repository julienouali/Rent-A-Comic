<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelBookAuthor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RelBookAuthorRepository")
 */
class RelBookAuthor
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Book", inversedBy="rel")
     */
    private $books;    
    
    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="rel")
     */
    private $authors;        

    /**
     * @var string
     *
     * @ORM\Column(name="authorType", type="string", length=4)
     */
    private $authorType;


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
     * Set authorType
     *
     * @param string $authorType
     * @return RelBookAuthor
     */
    public function setAuthorType($authorType)
    {
        $this->authorType = $authorType;

        return $this;
    }

    /**
     * Get authorType
     *
     * @return string 
     */
    public function getAuthorType()
    {
        return $this->authorType;
    }

    /**
     * Set books
     *
     * @param integer $books
     * @return RelBookAuthor
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
     * Set authors
     *
     * @param integer $authors
     * @return RelBookAuthor
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return integer 
     */
    public function getAuthors()
    {
        return $this->authors;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
    }

    
}
