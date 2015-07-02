<?php

namespace admin\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use home\loginBundle\Entity;

class DefaultController extends Controller
{
    /**
     * @Route("/admin")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/admin/gestionComptes")
     * @Template()
     */
    public function gestionComptesAction()
    {
        $repository = $this->getDoctrine()->getRepository('loginBundle:user');
        $allUsers = null;
        try{
            $allUsers = $repository->findAll();
        }
        catch(\Exception $e)
        {
            $error = "Une erreur est survenue " . $e->getMessage();
        }
        return array('error' => $error, 'allUsers' => $allUsers);
    }

    /**
     * @Route("/admin/creerCompte")
     * @Template()
     */
    public function creerCompteAction()
    {
        return array();
    }

    /**
     * @Route("/admin/creerCompte")
     * @Template()
     */
    public function modifierCompteAction($idUser)
    {
        $user = new user();
        $user= $user>loadUser($idUser);

        if (null == $user)
            $this->render("adminBundle:default:gestionComptes.html.twig",  array("error" => "idUser inexistant"));
        return array("user" => $user);
    }
}
