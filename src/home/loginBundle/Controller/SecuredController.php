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
        $this->checkSession();
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
            return $this->render("loginBundle:default:login.html.twig", array('error' => "Veuillez vous connecter pour accéder à cette partie du site"));
        }
    }

    /**
     * @Route("/secured/disconnect")
     * @Template()
     */
    public function disconnectSession()
    {
        //Cette fonction sert à fermer la session en cours
        $session = new session();
        $session->invalidate();
        return $this->render("loginBundle:default:index.html.twig", array('error' => ""));
    }
}



