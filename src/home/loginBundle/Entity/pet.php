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
     * @ORM\OneToOne(targetEntity="pet_category")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id")
     */
    private $idCategory;

    /**
     *
     * @ORM\Column(name="sex", type="string", length=255)
     */
    private $sex;

    /**
     * @ORM\OneToOne(targetEntity="user")
     * @ORM\JoinColumn(name="idOwner", referencedColumnName="id")
     */
    private $idOwner;

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

    /**
     * Set id owner
     *
     * @param string $idOwner
     * @return pet
     */

    public function setIdOwner($idOwner){
        $this->$idOwner = $idOwner;
    }

    /**
     * Get id owner
     *
     * @return string
     */
    public function getIdOwner(){
        return $this->idOwner;
    }
}