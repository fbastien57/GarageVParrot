<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarsRepository::class)]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Le nom du véhicule ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:50,
        minMessage:'Le produit ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le produit ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $fuelType = null;

    #[ORM\Column]
    #[Assert\Positive(message:"l'Année doit être positive")]
    #[Assert\NotBlank(message:'L\'Année ne peut pas être vide')]
    #[Assert\Range(
        min:1900 ,
        max:2024,
        notInRangeMessage:'L\'Année doit etre entre 1900 et 2024'
        )]
    private ?int $year = null;

    #[ORM\Column(length: 50)]
    private ?string $gearbox = null;

    #[ORM\Column]
    #[Assert\Positive(message:"le Kilométrage doit être positif")]
    #[Assert\NotBlank(message:'Le Kilométrage ne peut pas être vide')]
    #[Assert\Range(
        min:0 ,
        max:500000,
        notInRangeMessage:'Le kilométrage doit etre entre 0 et 500000'
        )]
    private ?int $kilometers = null;

    #[ORM\Column]
    #[Assert\Positive(message:"la puissance fiscale doit être positive")]
    #[Assert\NotBlank(message:'La puissance fiscale ne peut pas être vide')]
    #[Assert\Range(
        min:0 ,
        max:100,
        notInRangeMessage:'La puissance fiscal doit etre entre 0 et 100'
        )]
    private ?int $fiscalPower = null;

    #[ORM\Column]
    #[Assert\Positive(message:"la puissance doit être positive")]
    #[Assert\NotBlank(message:'La puissance ne peut pas être vide')]
    #[Assert\Range(
        min:0 ,
        max:1500,
        notInRangeMessage:'La puissance doit etre entre 0 et 1500'
        )]
    private ?int $power = null;

    #[ORM\Column]
    #[Assert\Positive(message:"le prix doit être positif")]
    #[Assert\NotBlank(message:'Le prix ne peut pas être vide')]
    #[Assert\Range(
        min:0 ,
        max:500000,
        notInRangeMessage:'Le prix doit etre entre 0 et 500000'
        )]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'La description ne peut pas être vide')]
    #[Assert\Length(
        min:0 ,
        max:255,
        minMessage:'La description ne doit pas etre inferieur à {{ limit }} caractères ',
        maxMessage:'La description ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    public function setFuelType(string $fuelType): static
    {
        $this->fuelType = $fuelType;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(string $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    public function setKilometers(int $kilometers): static
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(int $fiscalPower): static
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->power;
    }

    public function setPower(int $power): static
    {
        $this->power = $power;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}
