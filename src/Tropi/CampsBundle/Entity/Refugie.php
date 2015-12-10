<?php

namespace Tropi\CampsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Tropi\CampsBundle\Entity\Camp;

/**
 * Refugie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tropi\CampsBundle\Entity\RefugieRepository")
 */
class Refugie
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var integer
     *
     * @ORM\Column(name="poids", type="integer")
     */
    private $poids;

    /**
     * @var integer
     *
     * @ORM\Column(name="taille", type="integer")
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="cheveux", type="string", length=255)
     */
    private $cheveux;

    /**
     * @var string
     *
     * @ORM\Column(name="yeux", type="string", length=255)
     */
    private $yeux;

    /**
     * @var string
     *
     * @ORM\Column(name="paysOrigine", type="string", length=255)
     */
    private $paysOrigine;

    /**
     * @var string
     *
     * @ORM\Column(name="villeOrigine", type="string", length=255)
     */
    private $villeOrigine;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateArr", type="datetime")
     */
    private $dateArr;

    /**
     * @var string
     *
     * @ORM\Column(name="etatSante", type="string", length=255)
     */
    private $etatSante;

    /**
     * @var boolean
     *
     * @ORM\Column(name="contamine", type="boolean")
     */
    private $contamine;

    /**
     * @ORM\ManyToOne(targetEntity="Tropi\CampsBundle\Entity\Camp", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */
    private $camp_id;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Refugie
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Refugie
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Refugie
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set poids
     *
     * @param integer $poids
     *
     * @return Refugie
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;

        return $this;
    }

    /**
     * Get poids
     *
     * @return integer
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return Refugie
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return integer
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set cheveux
     *
     * @param string $cheveux
     *
     * @return Refugie
     */
    public function setCheveux($cheveux)
    {
        $this->cheveux = $cheveux;

        return $this;
    }

    /**
     * Get cheveux
     *
     * @return string
     */
    public function getCheveux()
    {
        return $this->cheveux;
    }

    /**
     * Set yeux
     *
     * @param string $yeux
     *
     * @return Refugie
     */
    public function setYeux($yeux)
    {
        $this->yeux = $yeux;

        return $this;
    }

    /**
     * Get yeux
     *
     * @return string
     */
    public function getYeux()
    {
        return $this->yeux;
    }

    /**
     * Set paysOrigine
     *
     * @param string $paysOrigine
     *
     * @return Refugie
     */
    public function setPaysOrigine($paysOrigine)
    {
        $this->paysOrigine = $paysOrigine;

        return $this;
    }

    /**
     * Get paysOrigine
     *
     * @return string
     */
    public function getPaysOrigine()
    {
        return $this->paysOrigine;
    }

    /**
     * Set villeOrigine
     *
     * @param string $villeOrigine
     *
     * @return Refugie
     */
    public function setVilleOrigine($villeOrigine)
    {
        $this->villeOrigine = $villeOrigine;

        return $this;
    }

    /**
     * Get villeOrigine
     *
     * @return string
     */
    public function getVilleOrigine()
    {
        return $this->villeOrigine;
    }

    /**
     * Set dateArr
     *
     * @param \DateTime $dateArr
     *
     * @return Refugie
     */
    public function setDateArr($dateArr)
    {
        $this->dateArr = $dateArr;

        return $this;
    }

    /**
     * Get dateArr
     *
     * @return \DateTime
     */
    public function getDateArr()
    {
        return $this->dateArr;
    }

    /**
     * Set etatSante
     *
     * @param string $etatSante
     *
     * @return Refugie
     */
    public function setEtatSante($etatSante)
    {
        $this->etatSante = $etatSante;

        return $this;
    }

    /**
     * Get etatSante
     *
     * @return string
     */
    public function getEtatSante()
    {
        return $this->etatSante;
    }

    /**
     * Set contamine
     *
     * @param boolean $contamine
     *
     * @return Refugie
     */
    public function setContamine($contamine)
    {
        $this->contamine = $contamine;

        return $this;
    }

    /**
     * Get contamine
     *
     * @return boolean
     */
    public function getContamine()
    {
        return $this->contamine;
    }
    
    public function setCamp_id(Camp $camp_id = null)
    {
        $this->camp_id = $camp_id;
    }

    public function getCamp_id()
    {
        return $this->camp_id;
    }
	

}

