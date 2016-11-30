<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jury
 *
 * @ORM\Table(name="jury")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\JuryRepository")
 */
class Jury
{
    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="jury")
     */
    private $votes;

    /**
     * @ORM\OneToMany(targetEntity="Validation", mappedBy="jury")
     */
    private $validations;

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
     * @var string
     *
     * @ORM\Column(name="entreprise", type="string", length=255)
     */
    private $entreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Jury
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
     * @return Jury
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
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return Jury
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Jury
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->votes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->validations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vote
     *
     * @param \BackBundle\Entity\Vote $vote
     *
     * @return Jury
     */
    public function addVote(\BackBundle\Entity\Vote $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove vote
     *
     * @param \BackBundle\Entity\Vote $vote
     */
    public function removeVote(\BackBundle\Entity\Vote $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * Add validation
     *
     * @param \BackBundle\Entity\Validation $validation
     *
     * @return Jury
     */
    public function addValidation(\BackBundle\Entity\Validation $validation)
    {
        $this->validations[] = $validation;

        return $this;
    }

    /**
     * Remove validation
     *
     * @param \BackBundle\Entity\Validation $validation
     */
    public function removeValidation(\BackBundle\Entity\Validation $validation)
    {
        $this->validations->removeElement($validation);
    }

    /**
     * Get validations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getValidations()
    {
        return $this->validations;
    }
}
