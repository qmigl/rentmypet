<?php

namespace admin\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/admin")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => "toto");
    }

    /**
     * @Route("/admin/{userSpecific}")
     * @Template()
     */
    public function adminUserAction($userSpecific)
    {
        return array('name' => $userSpecific);
    }
}
