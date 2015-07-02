<?php

namespace home\loginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pet
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class pet
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date")
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_category", type="integer")
     */
    private $idCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $sex;


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
     * Set name
     *
     * @param string $name
     * @return pet
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return pet
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return pet
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set idCategory
     *
     * @param integer $idCategory
     * @return pet
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    
        return $this;
    }

    /**
     * Get idCategory
     *
     * @return integer 
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return pet
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    
        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    public function loadPet($idPet = 0)
    {
        $pet = null;
        $id = $this->$id;

        if($idPet != 0) $id = $idPet;

        $error = null;
        $repository = $this->getDoctrine()->getRepository('loginBundle:pet');
        $qb = $repository->createQueryBuilder('p');
        $qb->where('p.id = :id')->setParameters(array('id' => $id));

        try { $pet= $qb->getQuery()->getResult(); }
        catch(\Exception $e){ $error = "une erreur est survenue " . $e->getMessage(); }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "pet" => $pet);
    }

    /*
    public function setPet($idPet = 0)
    {
        $error = null;
        $id = $this->$id;

        if($idPet != 0) $id = $idPet;

        $pet = loadPet($id);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pet);
            $em->flush();
        }catch(\Exception $e){
            $error = "Une erreur est survenue : " . $e->getMessage();
        }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "pet" => $pet);
    }
    */
}
