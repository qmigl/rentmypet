<?php

namespace home\loginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use home\loginBundle\Entity;
use Symfony\Component\Validator\Constraints\Null;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/")
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
     * @Route("/login")
     * @Template()
     */
    public function loginAction()
    {

        $error = "";
        //on vérifie que les deux champs sont rempli en post
        if (isset($_POST["_username"]) && isset($_POST["_password"])) {
            $repository = $this->getDoctrine()
                ->getRepository('loginBundle:user');

            $qb = $repository->createQueryBuilder('u');
            $qb->where('u.email = :email')
                ->setParameters(array('email' => $_POST["_username"]));
            $user = null;

            $array = $qb->getQuery()->getResult();
            if (count($array) > 0) {
                $user = $qb->getQuery()->getResult()[0];
            }

            //si $user est null c'est que l'email est inconnu
            if (null == $user) {
                return $this->render("loginBundle:default:login.html.twig", array('error' => "Compte inconnu, veuillez vous enregistrer"));
            } else {
            //si l'email est connu on vérifie que le password en post correspond à celui en base
                if ($user->comparePass($_POST["_password"])) {
                    $session = new Session();
                    $session->set('name', $_POST["_username"]);
                    return $this->render("loginBundle:Secured:index.html.twig", array('user' => $user, 'error' => $error));
                } else {
                    $error = ("Le mot de passe est erroné");
                }
            }
        }

        return array('error' => $error);
    }


    /**
     * @Route("/subscribe")
     * @Template()
     */
    public function subscribeAction($rights = 2)
    {
        $error = null;
        //on insert les valeurs en post dans l'objet $user
        if (count($_POST) > 7) {
            // Création / récupération d'une entité.
            $user = new Entity\user();
            $user->setEmail($_POST["_username"]);
            $user->setPassword($_POST["_password"]);
            $user->setLastName($_POST["_lastName"]);
            $user->setFirstName($_POST["_firstName"]);
            $user->setPhone($_POST["_tel"]);
            $user->setIdLocation($_POST["_departement"]);
            $user->setCity($_POST["_city"]);
            $user->setAdress($_POST["_adress"]);
            $user->setRights($rights);

            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $error = "Votre compte à bien été créé";
            } catch (\Exception $e) {
                $error = "une erreur est survenue :" . $e->getMessage();

                return $this->render("loginBundle:Secured:index.html.twig", array('user' => $user));
            }
        }
        return array('error' => $error);
    }

    /**
     * @Route("/")
     * @Template()
     */
    public function monCompteAction()
    {

        //On initialise la variable error a nul pour ne pas avoir de message d'erreur
        return array('error' => '');
    }
}



