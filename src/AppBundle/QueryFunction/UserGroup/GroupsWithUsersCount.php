<?php

namespace AppBundle\QueryFunction\UserGroup;

use AppBundle\Entity\UserGroup;

final class GroupsWithUsersCount
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
        $qb = $this->em->createQueryBuilder();

        return $qb->select('ug.name', 'COUNT(u.id) as countOfUsers')
            ->from(UserGroup::class, 'ug')
            ->leftJoin('ug.users', 'u')
            ->groupBy('ug.id')
            ->orderBy('ug.name')
            ->getQuery()
            ->getResult();
    }
}