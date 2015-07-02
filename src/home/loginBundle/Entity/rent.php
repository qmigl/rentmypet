<?php

namespace home\loginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rent
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class rent
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="date")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="date")
     */
    private $dateEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="pet_owner_id", type="integer")
     */
    private $petOwnerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pet_renter_id", type="integer")
     */
    private $petRenterId;

    /**
     * @var integer
     *
     * @ORM\Column(name="pet_id", type="integer")
     */
    private $petId;


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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return rent
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    
        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return rent
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    
        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set petOwnerId
     *
     * @param integer $petOwnerId
     * @return rent
     */
    public function setPetOwnerId($petOwnerId)
    {
        $this->petOwnerId = $petOwnerId;
    
        return $this;
    }

    /**
     * Get petOwnerId
     *
     * @return integer 
     */
    public function getPetOwnerId()
    {
        return $this->petOwnerId;
    }

    /**
     * Set petRenterId
     *
     * @param integer $petRenterId
     * @return rent
     */
    public function setPetRenterId($petRenterId)
    {
        $this->petRenterId = $petRenterId;
    
        return $this;
    }

    /**
     * Get petRenterId
     *
     * @return integer 
     */
    public function getPetRenterId()
    {
        return $this->petRenterId;
    }

    /**
     * Set petId
     *
     * @param integer $petId
     * @return rent
     */
    public function setPetId($petId)
    {
        $this->petId = $petId;
    
        return $this;
    }

    /**
     * Get petId
     *
     * @return integer 
     */
    public function getPetId()
    {
        return $this->petId;
    }
}
