<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
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
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Le message ne peut pas être vide')]
    #[Assert\Length(
        min:1 ,
        max:255,
        minMessage:'Le nessage ne doit pas etre inferieur à {{ limit }} caractères',
        maxMessage:'Le nessage ne doit pas etre superieur à {{ limit }} caractères'
        )]
    private ?string $comment = null;

    #[ORM\Column]
    #[Assert\Positive(message:"la note doit être positive")]
    #[Assert\NotBlank(message:'La note ne peut pas être vide')]
    #[Assert\Range(
        min:1 ,
        max:5,
        notInRangeMessage:'La note doit doit etre entre 1 et 5'
        )]
    private ?int $mark = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isPublished = null;

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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getMark(): ?int
    {
        return $this->mark;
    }

    public function setMark(int $mark): static
    {
        $this->mark = $mark;

        return $this;
    }

    public function isIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(?bool $isPublished): static
    {
        $this->isPublished = $isPublished;

        return $this;
    }
}
