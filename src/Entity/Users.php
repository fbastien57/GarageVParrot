<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Adresse email déja utilisée')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message:'L\'email ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:180,
        minMessage:'L\'email ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'L\'email ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank(message:'Le mot de passe ne peut pas être vide')]
    #[Assert\Length(
        min:8 ,
        max:100,
        minMessage:'Le mot de passe ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le mot de passe ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $password = null;

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
    private ?string $picture = null;

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }
}
