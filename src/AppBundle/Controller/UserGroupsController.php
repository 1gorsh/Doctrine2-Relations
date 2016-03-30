<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\UserGroup;

class UserGroupsController extends Controller
{
    /**
     * @Route("/user-groups", name="user-groups")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        /** @var callable $userGroups */
        $userGroups = $this->get('app.query_user_groups_with_users_count');

        return $this->render('groups/index.html.twig', [
            'userGroups' => $userGroups()
        ]);
    }

    /**
     * @Route("/group/{name}", name="group")
     * @ParamConverter("group", class="AppBundle:UserGroup")
     * @param UserGroup $group
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction(UserGroup $group)
    {
        return $this->render('groups/view.html.twig', [
            'group' => $group
        ]);
    }
}