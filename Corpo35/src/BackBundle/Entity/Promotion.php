<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Promotion
 *
 * @ORM\Table(name="promotion")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\PromotionRepository")
 */
class Promotion
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
     * @var DateTime
     *
     * @ORM\Column(name="annee", type="datetime")
     */
    private $annee;

    /**
     * @var bool
     *
     * @ORM\Column(name="archivage", type="boolean")
     */
    private $archivage;

    /**
     * @ORM\ManyToOne(targetEntity="Candidat")
     */
    private $candidats;

    /**
     * @var datetime
     * @ORM\Column(name="datelimite", type="datetime")
     */
    private $datelimite;

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
     * Set archivage
     *
     * @param boolean $archivage
     *
     * @return Promotion
     */
    public function setArchivage($archivage)
    {
        $this->archivage = $archivage;

        return $this;
    }

    /**
     * Get archivage
     *
     * @return bool
     */
    public function getArchivage()
    {
        return $this->archivage;
    }

    /**
     * @param DateTime $annee
     *
     */public function setAnnee($annee)
    {
        $this->annee = $annee;
    }

    /**
     * @return DateTime
     *
     */
    public function getAnnee()
    {
        return $this->annee;

    }
    public function getYear()
    {
        return $this->annee->format('Y');

    }

    /**
     * @param mixed $candidats
     */
    public function setCandidats($candidats)
    {
        $this->candidats = $candidats;
    }

    /**
     * @return mixed
     */
    public function getCandidats()
    {
        return $this->candidats;
    }

    /**
     * @param DateTime $datelimite
     */
    public function setEnddate($datelimite)
    {
        $this->datelimite = $datelimite;
    }

    /**
     * @return DateTime
     */
    public function getDatelimite()
    {
        return $this->datelimite;
    }

    /**
     * Set datelimite
     *
     * @param \DateTime $datelimite
     *
     * @return Promotion
     */
    public function setDatelimite($datelimite)
    {
        $this->datelimite = $datelimite;

        return $this;
    }
}
