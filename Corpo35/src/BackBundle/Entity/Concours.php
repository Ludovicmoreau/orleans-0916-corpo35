<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concours
 *
 * @ORM\Table(name="concours")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\ConcoursRepository")
 */
class Concours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="soustitres", type="string", length=255)
     */
    private $soustitres;

    /**
     * @var string
     *
     * @ORM\Column(name="paragraphe", type="text")
     */
    private $paragraphe;

    /**
     * @var string
     *
     * @ORM\Column(name="puces", type="string", length=255)
     */
    private $puces;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Concours
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set soustitres
     *
     * @param string $soustitres
     *
     * @return Concours
     */
    public function setSoustitres($soustitres)
    {
        $this->soustitres = $soustitres;

        return $this;
    }

    /**
     * Get soustitres
     *
     * @return string
     */
    public function getSoustitres()
    {
        return $this->soustitres;
    }

    /**
     * Set paragraphe
     *
     * @param string $paragraphe
     *
     * @return Concours
     */
    public function setParagraphe($paragraphe)
    {
        $this->paragraphe = $paragraphe;

        return $this;
    }

    /**
     * Get paragraphe
     *
     * @return string
     */
    public function getParagraphe()
    {
        return $this->paragraphe;
    }

    /**
     * Set puces
     *
     * @param string $puces
     *
     * @return Concours
     */
    public function setPuces($puces)
    {
        $this->puces = $puces;

        return $this;
    }

    /**
     * Get puces
     *
     * @return string
     */
    public function getPuces()
    {
        return $this->puces;
    }
}

