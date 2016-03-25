<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Tag;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        /** @var callable $posts */
        $posts = $this->get('app.query_posts_with_tags');

        return $this->render('default/index.html.twig', [
            'posts' => $posts()
        ]);
    }

    /**
     * @Route("/by-tag/{title}", name="postsByTag")
     * @ParamConverter("tag", class="AppBundle:Tag")
     * @param Tag $tag
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function byTagAction(Tag $tag)
    {
        /** @var callable $posts */
        $posts = $this->get('app.query_posts_by_tag');

        return $this->render('default/index.html.twig', [
            'posts' => $posts($tag)
        ]);
    }
}
