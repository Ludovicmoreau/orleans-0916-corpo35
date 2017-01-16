<?php
/**
 * Created by PhpStorm.
 * User: m21
 * Date: 25/11/16
 * Time: 12:01
 */

namespace BackBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\OneToOne(targetEntity="Candidat")
     */
    private $candidat;

    /**
     * @return mixed
     */
    public function getCandidat()
    {
        return $this->candidat;
    }

    /**
     * @param mixed $candidat
     */
    public function setCandidat($candidat)
    {
        $this->candidat = $candidat;
    }



    /**
     * @ORM\OneToMany(targetEntity="Validation", mappedBy="user")
     */
    private $validations;

    /**
     * @return mixed
     */
    public function getValidations()
    {
        return $this->validations;
    }

    /**
     * @param mixed $validations
     */
    public function setValidations($validations)
    {
        $this->validations = $validations;
    }

    /**
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="user")
     */
    private $votes;

    /**
     * @return mixed
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @param mixed $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }



    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

//    /**
//     * @ORM\Column(type="string", length=255)
//     *
//     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
//     * @Assert\Length(
//     *     min=3,
//     *     max=255,
//     *     minMessage="Votre nom est trop court.",
//     *     maxMessage="Votre nom est trop long",
//     *     groups={"Registration", "Profile"}
//     * )
//     */
//    protected $nom;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }



    /**
     * Add validation
     *
     * @param \BackBundle\Entity\Validation $validation
     *
     * @return User
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
     * Add vote
     *
     * @param \BackBundle\Entity\Vote $vote
     *
     * @return User
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
}
