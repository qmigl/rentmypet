<?php

namespace home\loginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use home\loginBundle\Entity;
use Symfony\Component\Validator\Constraints\Null;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => "enculé");
    }

    /**
     * @Route("/subscribe")
     * @Template()
     */
    public function subscribeAction()
    {

        $user = new user();
        $user->setAdress($_POST);

    }

    /**
     * @Route("/login")
     * @Template()
     */
    public function loginAction()
    {
        if (isset($_POST["_username"]) && isset($_POST["_password"])) {
            $repository = $this->getDoctrine()
                ->getRepository('loginBundle:user');


            $qb = $repository->createQueryBuilder('u');
            $qb->where('u.email = :email')
            ->setParameters(array('email' => $_POST["_username"]));

            $user = $qb->getQuery()->getResult()[0];

            if (null == $user){
                $this->render("loginBundle:default:login.html.twig",  array("error" => "tu n'existes pas"));
            }else{

                if ($user->comparePass($_POST["_password"])){
                    $_SESSION['username'] = $_POST['_username'];
                    var_dump($_SESSION);
                }else{

                }
            }
            return array();
        } else {
            return array();
        }
    }
}



