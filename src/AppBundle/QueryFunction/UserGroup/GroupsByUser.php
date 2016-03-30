<?php

namespace AppBundle\QueryFunction\UserGroup;

use AppBundle\Entity\User,
    AppBundle\Entity\UserGroup;

final class GroupsByUser
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(User $user)
    {
        $qb = $this->em->createQueryBuilder();
        $qb2 = $this->em->createQueryBuilder();

        $ids = $qb2->select('IDENTITY(u.group)')
            ->from(User::class, 'u')
            ->where('u.login = :login')
            ->setParameter('login', $user->getLogin())
            ->getQuery()
            ->getArrayResult();


        return $qb->select('ug')
            ->from(UserGroup::class, 'ug')
            ->where(
                $qb->expr()->in('ug.id',
                    array_map(function($el) {
                        return current($el);
                    }, $ids)
                )
            )
            ->orderBy('ug.name')
            ->getQuery()
            ->getResult();
    }
}