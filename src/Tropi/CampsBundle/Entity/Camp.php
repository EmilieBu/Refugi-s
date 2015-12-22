<?php

namespace Tropi\CampsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tropi\CampsBundle\Entity\Centrale;
use Tropi\CampsBundle\Entity\Refugie;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Camp
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tropi\CampsBundle\Entity\CampRepository")
 */
class Camp
{
    /**
     * @ORM\OneToMany(targetEntity="Refugie", mappedBy="camp")
     */
    protected $refugies;
    
    /**
     * @ORM\OneToMany(targetEntity="Quantite", mappedBy="camp")
     */
    protected $quantite;
    
    public function __construct()
    {
        $this->refugies = new ArrayCollection();
        $this->quantite = new ArrayCollection();
    }
    
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
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="datetime")
     */
    private $createdDate;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float")
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lon", type="float")
     */
    private $lon;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
	
	/**
     * @ORM\ManyToOne(targetEntity="Tropi\CampsBundle\Entity\Centrale", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=true)
     */
    private $centrale;


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
     *
     * @return Camp
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
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Camp
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Camp
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set lat
     *
     * @param float $lat
     *
     * @return Camp
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lon
     *
     * @param float $lon
     *
     * @return Camp
     */
    public function setLon($lon)
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get lon
     *
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Camp
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
     * Get nb_refugie
     *
     * @return integer
     */
    public function getNbRefugie()
    {
        $nb = count( $this->refugies );
        return $nb;
    }
	
	public function setCentrale(Centrale $centrale)
    {
        $this->centrale = $centrale;
    }

    public function getCentrale()
    {
        return $this->centrale;
    }
    public function getRefugies()
    {
        return $this->refugies;
    }
    public function getQuantite()
    {
        return $this->quantite;
    }
    public function __toString()
    {
        return $this->name;
    }
}

