<?php

namespace admin\adminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use home\loginBundle\Entity;

class DefaultController extends Controller
{
    /**
     * @Route("/admin/")
     * @Template()
     */
    public function indexAdminAction()
    {
        return array('error' => '');
    }

    /**
     * @Route("/admin/gestionComptes/")
     * @Template()
     */
    public function gestionComptesAction()
    {
        $repository = $this->getDoctrine()->getRepository('loginBundle:user');
        $allUsers = null;
        $error = '';
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
     * @Route("/admin/modifierCompte/{idUser}/")
     * @Template()
     */
    public function modifierCompteAction($idUser)
    {
        $error = '';
        $user = $this->getDoctrine()->getRepository('loginBundle:user')->find($idUser);

        if (count($_POST) > 0)
        {
            $user->setEmail($_POST["_username"]);
            $user->setPassword($_POST["_password"]);
            $user->setLastName($_POST["_lastName"]);
            $user->setFirstName($_POST["_firstName"]);
            $user->setPhone($_POST["_tel"]);
            $user->setIdLocation($_POST["_departement"]);
            $user->setCity($_POST["_city"]);
            $user->setAdress($_POST["_adress"]);

            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $error = "Modifications sauvegardées.";
            }catch(\Exception $e){
                $error = "Une erreur est survenue : " . $e->getMessage();
            }
        }
        if (null == $user) $this->render("adminBundle:default:gestionComptes.html.twig",  array('error' => 'idUser inexistant'));
        return array('error' => $error, "user" => $user);
    }
}
