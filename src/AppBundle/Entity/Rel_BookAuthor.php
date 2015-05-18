<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rel_BookAuthor
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Rel_BookAuthorRepository")
 */
class Rel_BookAuthor
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
     * @ORM\Column(name="books", type="integer")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Book", mappedBy="rel")
     */
    private $books;    
  /**
     * @var integer
     *
     * @ORM\Column(name="authors", type="integer")
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Author", mappedBy="rel")
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
     * @return Rel_BookAuthor
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
     * @return Rel_BookAuthor
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
     * @return Rel_BookAuthor
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
}
