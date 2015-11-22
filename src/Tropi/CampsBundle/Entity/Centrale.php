<?php

namespace Tropi\CampsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centrale
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Tropi\CampsBundle\Entity\CentraleRepository")
 */
class Centrale
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
     * @var integer
     *
     * @ORM\Column(name="nb_medicaments", type="integer")
     */
    private $nbMedicaments;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_plateaurepas", type="integer")
     */
    private $nbPlateaurepas;


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
     * Set nbMedicaments
     *
     * @param integer $nbMedicaments
     *
     * @return Centrale
     */
    public function setNbMedicaments($nbMedicaments)
    {
        $this->nbMedicaments = $nbMedicaments;

        return $this;
    }

    /**
     * Get nbMedicaments
     *
     * @return integer
     */
    public function getNbMedicaments()
    {
        return $this->nbMedicaments;
    }

    /**
     * Set nbPlateaurepas
     *
     * @param integer $nbPlateaurepas
     *
     * @return Centrale
     */
    public function setNbPlateaurepas($nbPlateaurepas)
    {
        $this->nbPlateaurepas = $nbPlateaurepas;

        return $this;
    }

    /**
     * Get nbPlateaurepas
     *
     * @return integer
     */
    public function getNbPlateaurepas()
    {
        return $this->nbPlateaurepas;
    }
}

