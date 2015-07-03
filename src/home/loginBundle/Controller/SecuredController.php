<?php

namespace home\loginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use home\loginBundle\Entity;
use Symfony\Component\Validator\Constraints\Null;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class SecuredController extends Controller
{
    /**
     * @Route("/secured/index")
     * @Template()
     */
    public function indexAction()
    {
        //On initialise la variable error a nul pour ne pas avoir de message d'erreur
        return array('error' => null);
    }

    public function checkSession()
    {
        //Cette fonction sert à vérfier que l'utilisateur est connecté
        $session = new session();
        if ($session->isStarted()) {
            return true;
        } else {
            return $this->render("loginBundle:default:login.html.twig", array('error' => "Veuillez vous connecter"));
        }

    }

    /**
     * @Route("/monCompte/")
     * @Template()
     */
    public function monCompteAction()
    {

        //On initialise la variable error a nul pour ne pas avoir de message d'erreur
        return array('error' => '');
    }

    /**
     * @Route("/monCompte/gestionPets")
     * @Template()
     */
    public function gestionPetsAction()
    {

        //On initialise la variable error a nul pour ne pas avoir de message d'erreur
        return array('error' => '');
    }

    /**
     * @Route("/monCompte/ajouterPet")
     * @Template()
     */
    public function ajouterPetAction()
    {

        //On initialise la variable error a nul pour ne pas avoir de message d'erreur
        return array('error' => '');
    }
}



