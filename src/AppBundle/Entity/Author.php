<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use \Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author
{
    /**
     * @var integer
     * @ORM\Column(type="guid", name="id", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @ORM\Embedded(class="AuthorFullName", columnPrefix=false)
     */
    protected $fullName;

    /**
     * @ORM\ManyToMany(targetEntity="Book")
     * @ORM\JoinTable(
     *     name="authors_books",
     *     joinColumns={
     *         @ORM\JoinColumn(name="book_id", referencedColumnName="id")
     *     },
     *     inverseJoinColumns={
     *         @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     *     }
     * )
     */
    protected $books;

    public function __construct(AuthorFullName $fullName)
    {
        $this->id = Uuid::uuid4();
        $this->fullName = $fullName;
        $this->books = new ArrayCollection();
    }

    /**
     * @return int|\Ramsey\Uuid\UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return AuthorFullName
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Add book
     *
     * @param \AppBundle\Entity\Book $book
     *
     * @return Author
     */
    public function addBook(\AppBundle\Entity\Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Remove book
     *
     * @param \AppBundle\Entity\Book $book
     */
    public function removeBook(\AppBundle\Entity\Book $book)
    {
        $this->books->removeElement($book);
    }

    /**
     * @return ArrayCollection
     */
    public function getBooks()
    {
        return $this->books;
    }
}