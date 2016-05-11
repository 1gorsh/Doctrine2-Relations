<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \InvalidArgumentException;

/** @ORM\Embeddable */
final class AuthorFullName
{
    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    protected $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", length=150)
     */
    protected $lastName;

    /**
     * constructor.
     * @param $firstName
     * @param $lastName
     */
    public function __construct($firstName, $lastName)
    {
        if ('' === (string) $firstName || '' === (string) $lastName) {
            throw new InvalidArgumentException('first name and last name must be not empty');
        }

        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->lastName, $this->firstName);
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
}