<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Partenaire
 *
 * @ORM\Table(name="partenaire")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\PartenaireRepository")
 */
class Partenaire
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
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="string", length=255)
     */
    private $resume;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     *
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_1", type="string", length=255, nullable=true)
     */
    private $contenu1;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_2", type="string", length=255, nullable=true)
     */
    private $contenu2;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_3", type="string", length=255, nullable=true)
     */
    private $contenu3;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_4", type="string", length=255, nullable=true)
     */
    private $contenu4;


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
     * Set image
     *
     * @param string $image
     *
     * @return Partenaire
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set resume
     *
     * @param string $resume
     *
     * @return Partenaire
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set website
     *
     * @param string $website
     *
     * @return Partenaire
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Partenaire
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Partenaire
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set contenu1
     *
     * @param string $contenu1
     *
     * @return Partenaire
     */
    public function setContenu1($contenu1)
    {
        $this->contenu1 = $contenu1;

        return $this;
    }

    /**
     * Get contenu1
     *
     * @return string
     */
    public function getContenu1()
    {
        return $this->contenu1;
    }

    /**
     * Set contenu2
     *
     * @param string $contenu2
     *
     * @return Partenaire
     */
    public function setContenu2($contenu2)
    {
        $this->contenu2 = $contenu2;

        return $this;
    }

    /**
     * Get contenu2
     *
     * @return string
     */
    public function getContenu2()
    {
        return $this->contenu2;
    }

    /**
     * Set contenu3
     *
     * @param string $contenu3
     *
     * @return Partenaire
     */
    public function setContenu3($contenu3)
    {
        $this->contenu3 = $contenu3;

        return $this;
    }

    /**
     * Get contenu3
     *
     * @return string
     */
    public function getContenu3()
    {
        return $this->contenu3;
    }

    /**
     * Set contenu4
     *
     * @param string $contenu4
     *
     * @return Partenaire
     */
    public function setContenu4($contenu4)
    {
        $this->contenu4 = $contenu4;

        return $this;
    }

    /**
     * Get contenu4
     *
     * @return string
     */
    public function getContenu4()
    {
        return $this->contenu4;
    }
}
