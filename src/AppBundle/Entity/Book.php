<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\BookRepository")
 * @ORM\Table(name="book")
 */
class Book
{
    /**
     * @var integer
     * @ORM\Column(type="guid", name="id", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * constructor.
     * @param $title
     */
    public function __construct($title)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
    }

    /**
     * @return int|\Ramsey\Uuid\UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}