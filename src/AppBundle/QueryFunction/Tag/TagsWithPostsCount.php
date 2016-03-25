<?php

namespace AppBundle\QueryFunction\Tag;

final class TagsWithPostsCount
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

        return $qb->select('t.title', 'COUNT(p.id) as countOfPosts')
            ->from('AppBundle:Tag', 't')
            ->innerJoin('t.posts', 'p')
            ->groupBy('t.id')
            ->orderBy('t.title')
            ->getQuery()
            ->getResult();
    }
}