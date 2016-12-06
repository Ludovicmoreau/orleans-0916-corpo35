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
     */public function getAnnee()
    {
    return $this->annee;
    }
}
