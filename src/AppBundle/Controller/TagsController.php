<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagsController extends Controller
{
    /**
     * @Route("/tags", name="tags")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        /** @var callable $tags */
        $tags = $this->get('app.query_tags_with_posts_count');

        return $this->render('tags/index.html.twig', [
            'tags' => $tags()
        ]);
    }
}