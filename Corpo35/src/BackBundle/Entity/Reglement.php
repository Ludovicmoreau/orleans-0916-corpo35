<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reglement
 *
 * @ORM\Table(name="reglement")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\ReglementRepository")
 */
class Reglement
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
     * @ORM\Column(name="paragrapheun", type="text", nullable=true)
     */
    private $paragrapheun;

    /**
     * @var string
     *
     * @ORM\Column(name="paragraphedeux", type="text", nullable=true)
     */
    private $paragraphedeux;

    /**
     * @var string
     *
     * @ORM\Column(name="paragraphetrois", type="text", nullable=true)
     */
    private $paragraphetrois;

    /**
     * @var string
     *
     * @ORM\Column(name="paragraphequatre", type="text", nullable=true)
     */
    private $paragraphequatre;

    /**
     * @var string
     *
     * @ORM\Column(name="paragraphecinq", type="text", nullable=true)
     */
    private $paragraphecinq;

    /**
     * @var string
     *
     * @ORM\Column(name="paragraphesix", type="text", nullable=true)
     */
    private $paragraphesix;

    /**
     * @var string
     *
     * @ORM\Column(name="paragraphesept", type="text", nullable=true)
     */
    private $paragraphesept;

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
     * Set paragrapheun
     *
     * @param string $paragrapheun
     *
     * @return Reglement
     */
    public function setParagrapheun($paragrapheun)
    {
        $this->paragrapheun = $paragrapheun;

        return $this;
    }

    /**
     * Get paragrapheun
     *
     * @return string
     */
    public function getParagrapheun()
    {
        return $this->paragrapheun;
    }

    /**
     * Set paragraphedeux
     *
     * @param string $paragraphedeux
     *
     * @return Reglement
     */
    public function setParagraphedeux($paragraphedeux)
    {
        $this->paragraphedeux = $paragraphedeux;

        return $this;
    }

    /**
     * Get paragraphedeux
     *
     * @return string
     */
    public function getParagraphedeux()
    {
        return $this->paragraphedeux;
    }

    /**
     * Set paragraphetrois
     *
     * @param string $paragraphetrois
     *
     * @return Reglement
     */
    public function setParagraphetrois($paragraphetrois)
    {
        $this->paragraphetrois = $paragraphetrois;

        return $this;
    }

    /**
     * Get paragraphetrois
     *
     * @return string
     */
    public function getParagraphetrois()
    {
        return $this->paragraphetrois;
    }

    /**
     * Set paragraphequatre
     *
     * @param string $paragraphequatre
     *
     * @return Reglement
     */
    public function setParagraphequatre($paragraphequatre)
    {
        $this->paragraphequatre = $paragraphequatre;

        return $this;
    }

    /**
     * Get paragraphequatre
     *
     * @return string
     */
    public function getParagraphequatre()
    {
        return $this->paragraphequatre;
    }

    /**
     * Set paragraphecinq
     *
     * @param string $paragraphecinq
     *
     * @return Reglement
     */
    public function setParagraphecinq($paragraphecinq)
    {
        $this->paragraphecinq = $paragraphecinq;

        return $this;
    }

    /**
     * Get paragraphecinq
     *
     * @return string
     */
    public function getParagraphecinq()
    {
        return $this->paragraphecinq;
    }

    /**
     * Set paragraphesix
     *
     * @param string $paragraphesix
     *
     * @return Reglement
     */
    public function setParagraphesix($paragraphesix)
    {
        $this->paragraphesix = $paragraphesix;

        return $this;
    }

    /**
     * Get paragraphesix
     *
     * @return string
     */
    public function getParagraphesix()
    {
        return $this->paragraphesix;
    }

    /**
     * Set paragraphesept
     *
     * @param string $paragraphesept
     *
     * @return Reglement
     */
    public function setParagraphesept($paragraphesept)
    {
        $this->paragraphesept = $paragraphesept;

        return $this;
    }

    /**
     * Get paragraphesept
     *
     * @return string
     */
    public function getParagraphesept()
    {
        return $this->paragraphesept;
    }
}
