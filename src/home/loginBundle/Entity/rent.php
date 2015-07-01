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

    public function loadRent($idRent = 0)
    {
        $rent = null;
        $id = $this->$id;

        if($idRent != 0) $id = $idRent;

        $error = null;
        $repository = $this->getDoctrine()->getRepository('loginBundle:rent');
        $qb = $repository->createQueryBuilder('p');
        $qb->where('p.id = :id')->setParameters(array('id' => $id));

        try { $rent= $qb->getQuery()->getResult(); }
        catch(\Exception $e){ $error = "une erreur est survenue " . $e->getMessage(); }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "rent" => $rent);
    }

    public function setRent($idRent = 0)
    {
        $error = null;
        $id = $this->$id;

        if($idRent != 0) $id = $idRent;

        $rent = loadRent($id);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rent);
            $em->flush();
        }catch(\Exception $e){
            $error = "Une erreur est survenue : " . $e->getMessage();
        }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "rent" => $rent);
    }
}
