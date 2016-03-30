<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/user/{login}", name="user")
     * @ParamConverter("user", class="AppBundle:User")
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(User $user)
    {
        /** @var callable $groupsByUser */
        $groupsByUser = $this->get('app.query_groups_by_user');

        return $this->render('users/view.html.twig', [
            'user' => $user,
            'groups' => $groupsByUser($user)
        ]);
    }
}