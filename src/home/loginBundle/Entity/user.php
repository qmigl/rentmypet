<?php

namespace home\loginBundle\Entity\home;

use Doctrine\ORM\Mapping as ORM;

/**
 * user
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class user
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="idLocation", type="integer")
     */
    private $idLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var integer
     *
     * @ORM\Column(name="rights", type="integer")
     */
    private $rights;


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
     * Set email
     *
     * @param string $email
     * @return user
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return user
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return user
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return user
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return user
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set idLocation
     *
     * @param integer $idLocation
     * @return user
     */
    public function setIdLocation($idLocation)
    {
        $this->idLocation = $idLocation;
    
        return $this;
    }

    /**
     * Get idLocation
     *
     * @return integer 
     */
    public function getIdLocation()
    {
        return $this->idLocation;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return user
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return user
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    
        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set rights
     *
     * @param integer $rights
     * @return user
     */
    public function setRights($rights)
    {
        $this->rights = $rights;
    
        return $this;
    }

    /**
     * Get rights
     *
     * @return integer 
     */
    public function getRights()
    {
        return $this->rights;
    }

    public function loadUser($idUser = 0)
    {
        $user = null;
        $id = $this->$id;

        if($idUser != 0) $id = $idUser;

        $error = null;
        $repository = $this->getDoctrine()->getRepository('loginBundle:user');
        $qb = $repository->createQueryBuilder('p');
        $qb->where('p.id = :id')->setParameters(array('id' => $id));

        try { $user= $qb->getQuery()->getResult(); }
        catch(\Exception $e){ $error = "une erreur est survenue " . $e->getMessage(); }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "user" => $user);
    }

    public function setUser($idUser = 0)
    {
        $error = null;
        $id = $this->$id;

        if($idUser != 0) $id = $idUser;

        $user = loadUser($id);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }catch(\Exception $e){
            $error = "Une erreur est survenue : " . $e->getMessage();
        }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "user" => $user);
    }

    public function getUserByEmail($email)
    {
        $error = null;
        $user = null;

        $repository = $this->getDoctrine()->getRepository('loginBundle:User');
        $qb = $repository->createQueryBuilder('p');
        $qb->where('p.email = :email')->setParameters(array('email' => $email));

        try { $user= $qb->getQuery()->getResult(); }
        catch(\Exception $e){ $error = "une erreur est survenue " . $e->getMessage(); }

        // Passage de paramètres à ma vue index.html.twig
        return array('error' => $error, "user" => $user);
    }


}
