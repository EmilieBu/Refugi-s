<?php

namespace Tropi\CampsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Camp
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tropi\CampsBundle\Entity\CampRepository")
 */
class Camp
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
     * @var boolean
     *
     * @ORM\Column(name="plein", type="boolean")
     */
    private $plein;
	
	 /**
     * @var integer
     *
     * @ORM\Column(name="placeTotale", type="integer")
     */
    private $placeTotale;
	
	 /**
     * @var integer
     *
     * @ORM\Column(name="nb_refugie", type="integer")
     */
    private $nb_refugie;
	
	/**
     * @ORM\OneToOne(targetEntity="Tropi\CampsBundle\Entity\Centrale", cascade={"persist"})
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
     * Set plein
     *
     * @param boolean $plein
     *
     * @return Refugie
     */
    public function setPlein($plein)
    {
        $this->plein = $plein;

        return $this;
    }

    /**
     * Get plein
     *
     * @return boolean
     */
    public function getPlein()
    {
        return $this->plein;
    }
	
	 /**
     * Set placeTotale
     *
     * @param integer $placeTotale
     *
     * @return Refugie
     */
    public function setPlaceTotale($placeTotale)
    {
        $this->placeTotale = $placeTotale;

        return $this;
    }

    /**
     * Get placeTotale
     *
     * @return integer
     */
    public function getPlaceTotale()
    {
        return $this->placeTotale;
    }
	
	 /**
     * Set nb_refugie
     *
     * @param integer $nb_refugie
     *
     * @return Refugie
     */
    public function setNb_refugie($nb_refugie)
    {
        $this->nb_refugie = $nb_refugie;

        return $this;
    }

    /**
     * Get nb_refugie
     *
     * @return integer
     */
    public function getNb_refugie()
    {
        return $this->nb_refugie;
    }
	
	
	    public function setCentrale(Centrale $centrale = null)
    {
        $this->centrale = $centrale;
    }

    public function getCentrale()
    {
        return $this->centrale;
    }
}

