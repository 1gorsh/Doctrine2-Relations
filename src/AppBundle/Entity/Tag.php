<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\TagRepository")
 * @ORM\Table(name="tag")
 */
class Tag
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="guid", name="id", nullable=false)
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

    /**
     * @var \Doctrine\Common\Collections\Collection|Post[]
     *
     * @ORM\ManyToMany(targetEntity="Post", mappedBy="tags")
     */
    protected $posts;

    /**
     * Default constructor, initializes collections
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

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
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
