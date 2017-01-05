<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\VoteRepository")
 */
class Vote
{
    /**
     *
     * @ORM\ManyToOne(targetEntity="Candidat", inversedBy="votes")
     *
     */
    private $candidat;

    /**
     * @ORM\ManyToOne(targetEntity="Jury", inversedBy="votes")
     *
     */
    private $jury;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;


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
     * Set note
     *
     * @param integer $note
     *
     * @return Vote
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set candidat
     *
     * @param \BackBundle\Entity\Candidat $candidat
     *
     * @return Vote
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

    /**
     * Set jury
     *
     * @param \BackBundle\Entity\Jury $jury
     *
     * @return Vote
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
}
