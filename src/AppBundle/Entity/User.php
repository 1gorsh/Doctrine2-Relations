<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User
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
     * @ORM\Column(type="string", length=255, name="login", nullable=false)
     */
    protected $login;

    /**
     * @var UserGroup|null the group this user belongs (if any)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\UserGroup", inversedBy="users")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    protected $group;

    /**
     * @param string $login
     */
    public function __construct($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return UserGroup|null
     */
    public function getGroup()
    {
        return $this->group;
    }
}