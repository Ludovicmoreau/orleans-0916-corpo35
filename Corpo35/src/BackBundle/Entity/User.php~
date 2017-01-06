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


}
