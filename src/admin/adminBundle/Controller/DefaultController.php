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

    /**
     * @Route("/admin/gestionComptes")
     * @Template()
     */
    public function gestionComptesAction($userSpecific)
    {
        return array('name' => $userSpecific);
    }

    /**
     * @Route("/admin/creerCompte")
     * @Template()
     */
    public function creerCompteAction($userSpecific)
    {
        return array('name' => $userSpecific);
    }

    /**
     * @Route("/admin/gestionGrp")
     * @Template()
     */
    public function gestionGrpAction($userSpecific)
    {
        return array('name' => $userSpecific);
    }

    /**
     * @Route("/admin/creerGrp")
     * @Template()
     */
    public function creerGrpAction($userSpecific)
    {
        return array('name' => $userSpecific);
    }
}
