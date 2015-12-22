<?php

namespace Tropi\CampsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quantite
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tropi\CampsBundle\Entity\QuantiteRepository")
 */
class Quantite
{
    public function __construct(Camp $camp, Produit $product)
    {
        $this->camp = $camp;
        $this->produit = $product;
        $this->quantite = 0;
        $this->quantiteRequired = 0;
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
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="quantiteRequired", type="integer")
     */
    private $quantiteRequired;
	
	
	/**
     * @ORM\ManyToOne(targetEntity="Tropi\CampsBundle\Entity\Camp", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */
    private $camp;
	
	/**
     * @ORM\ManyToOne(targetEntity="Tropi\CampsBundle\Entity\Produit", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
    
    /**
     * Set quantiteRequired
     *
     * @param integer $quantiteRequired
     *
     * @return QuantiteRequired
     */
    public function setQuantiteRequired($quantiteRequired)
    {
        $this->quantiteRequired = $quantiteRequired;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantiteRequired()
    {
        return $this->quantiteRequired;
    }

	
	public function setCamp(Camp $camp = null)
    {
        $this->camp = $camp;
    }

    public function getCamp()
    {
        return $this->camp;
    }
	
	public function setProduit(Produit $produit = null)
    {
        $this->produit = $produit;
    }

    public function getProduit()
    {
        return $this->produit;
    }
}

