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
     * @Route("/secured/disconnect")
     * @Template()
     */
    public function disconnectAction()
    {
        //On initialise la variable error a nul pour ne pas avoir de message d'erreur
        $session = new session;
        $session->invalidate();
        return $this->redirect('/');
        //On redirige vers l'accueil
    }

    /**
     * @Route("/secured/ajouterPet")
     * @Template()
     */

    //On a créer la fonction ajouter un animal mais elle ne fonctionne pas car on  a pas eu le temps de finir la récupération automatique de l'ID de l'utilisateur connecté
    public function ajouterPetAction()
    {
        $error = null;
        //on insert les valeurs en post dans l'objet $user
        if (count($_POST) > 3) {
            // Création / récupération d'une entité.
            $pet = new Entity\pet();
            $pet->setName($_POST["_petName"]);
            $pet->setBirthdate($_POST["_birthDate"]);
            $pet->setDescription($_POST["_description"]);
            $pet->setSex($_POST["_sex"]);
            $pet->setIdOwner('1');

            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($pet);
                $em->flush();
                $error = "animal ajouté";
            } catch (\Exception $e) {
                $error = "une erreur est survenue :" . $e->getMessage();

                return $this->render("loginBundle:Secured:index.html.twig", array('pet' => $pet, 'error' => $error));
            }



        }
        return array('error' => $error);
    }

}



