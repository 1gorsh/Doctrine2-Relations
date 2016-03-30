<?php

namespace AppBundle\QueryFunction\Post;

use AppBundle\Entity\Tag,
    AppBundle\Entity\Post;

final class PostsByTag
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;

    public function __construct(\Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(Tag $tag)
    {
        $qb = $this->em->createQueryBuilder();

        return $qb->select('p', 't')
            ->from(Post::class, 'p')
            ->leftJoin('p.tags', 't')
            ->where(':tag MEMBER OF p.tags')
            ->setParameter('tag', $tag)
            ->orderBy('p.publishedAt')
            ->getQuery()
            ->getResult();
    }
}