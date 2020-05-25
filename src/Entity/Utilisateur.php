<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(
 * fields={"username"},
 * message="Ce pseudo existe déja."
 * )
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min=3,
     * max=10,
     * minMessage="Il faut plus de {{ limit }} caractères",
     * maxMessage="Il faut moins de {{ limit }} caractères"
     *  ) 
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min=3,
     * max=10,
     * minMessage="Il faut plus de {{ limit }} caractères",
     * maxMessage="Il faut moins de {{ limit }} caractères"
     * )
     */
    private $password;

    /** 
    * @Assert\Length(
    * min=3,
    * max=30,
    * minMessage="Il faut plus de {{ limit }} caractères",
    * maxMessage="Il faut moins de {{ limit }} caractères"
    * )
    * @Assert\EqualTo(
    * propertyPath="password",
    * message="Les mdp ne sont pas équivalents"
    * )
    */
    private $verificationPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getVerificationPassword(): ?string
    {
        return $this->verificationPassword;
    }

    public function setverificationPassword(string $verificationPassword): self
    {
        $this->verificationPassword = $verificationPassword;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }
}
