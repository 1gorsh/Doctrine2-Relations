<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Tag;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $posts = $this->get('app.post_repository')->getWithTags();

        return $this->render('default/index.html.twig', [
            'posts' => $posts
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
        $posts = $this->get('app.post_repository')->getByTag($tag);

        return $this->render('default/index.html.twig', [
            'posts' => $posts
        ]);
    }
}
