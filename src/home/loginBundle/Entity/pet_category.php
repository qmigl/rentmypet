<?php

namespace home\loginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pet_category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class pet_category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return pet_category
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    public function loadCat($idCat = 0)
    {
        $cat = null;
        $id = $this->$id;

        if($idCat != 0) $id = $idCat;

        $error = null;
        $repository = $this->getDoctrine()->getRepository('loginBundle:pet_category');
        $qb = $repository->createQueryBuilder('p');
        $qb->where('p.id = :id')->setParameters(array('id' => $id));

        try { $cat= $qb->getQuery()->getResult(); }
        catch(\Exception $e){ $error = "une erreur est survenue " . $e->getMessage(); }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "category" => $cat);
    }

    public function setCat($idCat = 0)
    {
        $error = null;
        $id = $this->$id;

        if($idCat != 0) $id = $idCat;

        $cat = loadCat($id);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
        }catch(\Exception $e){
            $error = "Une erreur est survenue : " . $e->getMessage();
        }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "category" => $cat);
    }
}
