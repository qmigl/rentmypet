<?php

namespace home\loginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use home\loginBundle\Entity;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/insertUser")
     * @Template()
     */
    public function getUserAction($id)
    {
        $profile = Entity/user/getUserByID($id);
        $error = $profile['error'];
        if (isset($error) || empty($error)) {
            $user = $profile['user'];
        }

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }catch(\Exception $e){
            $error = "Une erreur est survenue : " . $e->getMessage();
        }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "userInsert" => $user);
    }

    /**
     * @Route("/getAllUsers")
     * @Template()
     */
    public function allUsersAction()
    {
        $error = null;

        $repository = $this->getDoctrine()
            ->getRepository('loginBundle:User');

        /*
                $qb = $repository->createQueryBuilder('p');
                $qb->where('p.id = :id')
                    ->andWhere('p.mail = :mail')
                    ->setParameters(array('id' => 21, 'mail' => ""));

                $profile = $qb->getQuery()->getResult();
        */
        try {
            $allProfile = $repository->findAll();
        }catch(\Exception $e){
            $error = "une erreur est survenue " . $e->getMessage();
        }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "allUser" => $allProfile);
    }


}
