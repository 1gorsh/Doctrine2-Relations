<?php

namespace AppBundle\QueryFunction\Book;

use AppBundle\Entity\Book;

final class BooksWithAuthorsCount
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke()
    {
        $query = $this->em->createQuery(
            'SELECT b.title, COUNT(a) as authorsCount FROM AppBundle:Book b LEFT JOIN AppBundle:Author a WITH b MEMBER OF a.books'
        );

        return $query->getResult();
    }
}