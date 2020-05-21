<?php

namespace App\Entity;

use App\Repository\AlimentRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=AlimentRepository::class)
 */
class Aliment
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
     * max=15, 
     * minMessage ="Le nom doit faire {{ limit }} caractères minimum",
     * maxMessage ="Le nom doit faire moins de {{ limit }} caractères"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(
     * min=0.1, 
     * max=100, 
     * minMessage ="Le prix doit être supérieur à {{ limit }}", 
     * maxMessage ="Le prix doit $etre inférieur à {{ limit }}"
     * )
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     * min=3, 
     * max=255, 
     * minMessage ="Le chemin de l'image doit faire au moins {{ limit }} caractères",
     * maxMessage ="Le chemin de l'image doit faire au {{ limit }} caractères maximum"
     * )
     */
    private $image;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     * min=1, 
     * max=6000, 
     * minMessage ="La calorie doit être supérieur à {{ limit }}", 
     * maxMessage ="La calorie doit être inférieur à {{ limit }}"
     * )
     */
    private $calorie;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(
     * min=0.1, 
     * max=100, 
     * minMessage ="La protéine doit être supérieur à {{ limit }}", 
     * maxMessage ="La protéine doit être inférieur à {{ limit }}"
     * )
     */
    private $proteine;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(
     * min=0.1, 
     * max=100, 
     * minMessage ="Le glucide doit être supérieur à {{ limit }}", 
     * maxMessage ="Le glucide doit être inférieur à {{ limit }}"
     * )
     */
    private $glucide;

    /**
     * @ORM\Column(type="float")
     * @Assert\Range(
     * min=0.1, 
     * max=100, 
     * minMessage ="Le lipide doit être supérieur à {{ limit }}", 
     * maxMessage ="Le lipide doit être inférieur à {{ limit }}"
     * )
     */
    private $lipide;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCalorie(): ?int
    {
        return $this->calorie;
    }

    public function setCalorie(int $calorie): self
    {
        $this->calorie = $calorie;

        return $this;
    }

    public function getProteine(): ?float
    {
        return $this->proteine;
    }

    public function setProteine(float $proteine): self
    {
        $this->proteine = $proteine;

        return $this;
    }

    public function getGlucide(): ?float
    {
        return $this->glucide;
    }

    public function setGlucide(float $glucide): self
    {
        $this->glucide = $glucide;

        return $this;
    }

    public function getLipide(): ?float
    {
        return $this->lipide;
    }

    public function setLipide(float $lipide): self
    {
        $this->lipide = $lipide;

        return $this;
    }
}
