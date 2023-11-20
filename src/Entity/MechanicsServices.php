<?php

namespace App\Entity;

use App\Repository\MechanicsServicesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MechanicsServicesRepository::class)]
class MechanicsServices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Le service ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Le service ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le service ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $service = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): static
    {
        $this->service = $service;

        return $this;
    }
}