<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
class Contacts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message:'Le nom ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:50,
        minMessage:'Le nom ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le nom ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message:'Le prenom ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:50,
        minMessage:'Le prenom ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le prenom ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'L\'email ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'L\email ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'L\email ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message:'Le numéro de téléphone ne peut pas être vide')]
    #[Assert\Length(
        min:10,
        max:10,
        minMessage:'Le numéro de téléphone ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le numéro de téléphone ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Le message ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Le message ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le message ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
