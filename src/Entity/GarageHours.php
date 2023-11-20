<?php

namespace App\Entity;

use App\Repository\GarageHoursRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GarageHoursRepository::class)]
class GarageHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Les horaires ne peuvent pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Les horairesne doivent pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Les horairesne doivent pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $mondayHours = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Les horaires ne peuvent pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Les horairesne doivent pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Les horairesne doivent pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $tuesdayHours = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Les horaires ne peuvent pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Les horairesne doivent pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Les horairesne doivent pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $wednesdayHours = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Les horaires ne peuvent pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Les horairesne doivent pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Les horairesne doivent pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $thursdayHours = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Les horaires ne peuvent pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Les horairesne doivent pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Les horairesne doivent pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $fridayHours = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Les horaires ne peuvent pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Les horairesne doivent pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Les horairesne doivent pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $saturdayHours = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Les horaires ne peuvent pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Les horairesne doivent pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Les horairesne doivent pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $sundayHours = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMondayHours(): ?string
    {
        return $this->mondayHours;
    }

    public function setMondayHours(string $mondayHours): static
    {
        $this->mondayHours = $mondayHours;

        return $this;
    }

    public function getTuesdayHours(): ?string
    {
        return $this->tuesdayHours;
    }

    public function setTuesdayHours(string $tuesdayHours): static
    {
        $this->tuesdayHours = $tuesdayHours;

        return $this;
    }

    public function getWednesdayHours(): ?string
    {
        return $this->wednesdayHours;
    }

    public function setWednesdayHours(string $wednesdayHours): static
    {
        $this->wednesdayHours = $wednesdayHours;

        return $this;
    }

    public function getThursdayHours(): ?string
    {
        return $this->thursdayHours;
    }

    public function setThursdayHours(string $thursdayHours): static
    {
        $this->thursdayHours = $thursdayHours;

        return $this;
    }

    public function getFridayHours(): ?string
    {
        return $this->fridayHours;
    }

    public function setFridayHours(string $fridayHours): static
    {
        $this->fridayHours = $fridayHours;

        return $this;
    }

    public function getSaturdayHours(): ?string
    {
        return $this->saturdayHours;
    }

    public function setSaturdayHours(string $saturdayHours): static
    {
        $this->saturdayHours = $saturdayHours;

        return $this;
    }

    public function getSundayHours(): ?string
    {
        return $this->sundayHours;
    }

    public function setSundayHours(string $sundayHours): static
    {
        $this->sundayHours = $sundayHours;

        return $this;
    }
}
