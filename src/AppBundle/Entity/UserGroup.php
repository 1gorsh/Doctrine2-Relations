<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\UserGroupRepository")
 * @ORM\Table(name="usergroups")
 */
class UserGroup
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer",name="id", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, name="name", nullable=false)
     */
    protected $name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="group")
     */
    protected $users;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->users = new ArrayCollection();
        $this->setName($name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}