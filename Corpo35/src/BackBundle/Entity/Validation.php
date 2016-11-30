<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Validation
 *
 * @ORM\Table(name="validation")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\ValidationRepository")
 */
class Validation
{
    /**
     * @ORM\ManyToOne(targetEntity="Jury", inversedBy="validations")
     *
     */
    private $jury;

    /**
     * @ORM\ManyToOne(targetEntity="Candidat", inversedBy="validations")
     *
     */
    private $candidat;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="validation", type="boolean")
     */
    private $validation;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="text")
     */
    private $commentaire;


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
     * Set validation
     *
     * @param boolean $validation
     *
     * @return Validation
     */
    public function setValidation($validation)
    {
        $this->validation = $validation;

        return $this;
    }

    /**
     * Get validation
     *
     * @return bool
     */
    public function getValidation()
    {
        return $this->validation;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Validation
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set jury
     *
     * @param \BackBundle\Entity\Jury $jury
     *
     * @return Validation
     */
    public function setJury(\BackBundle\Entity\Jury $jury = null)
    {
        $this->jury = $jury;

        return $this;
    }

    /**
     * Get jury
     *
     * @return \BackBundle\Entity\Jury
     */
    public function getJury()
    {
        return $this->jury;
    }

    /**
     * Set candidat
     *
     * @param \BackBundle\Entity\Candidat $candidat
     *
     * @return Validation
     */
    public function setCandidat(\BackBundle\Entity\Candidat $candidat = null)
    {
        $this->candidat = $candidat;

        return $this;
    }

    /**
     * Get candidat
     *
     * @return \BackBundle\Entity\Candidat
     */
    public function getCandidat()
    {
        return $this->candidat;
    }
}
