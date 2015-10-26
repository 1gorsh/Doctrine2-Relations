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
        $tags = $this->get('app.tag_repository')->getAllWithPostsCount();

        return $this->render('tags/index.html.twig', [
            'tags' => $tags
        ]);
    }
}