<?php

namespace App\Data;
use Symfony\Component\Validator\Constraints as Assert;


class SearchData
{

    #[Assert\Range(
        min:0 ,
        max:500000,
        notInRangeMessage:'Le prix doit etre entre 0 et 500000'
        )]
    public ?int $minPrice = null;

    #[Assert\Range(
        min:0 ,
        max:500000,
        notInRangeMessage:'Le prix doit etre entre 0 et 500000'
        )]
    public ?int $maxPrice = null;

    #[Assert\Range(
        min:0 ,
        max:500000,
        notInRangeMessage:'Le kilometrage doit etre entre 0 et 500000'
        )]
    public ?int $minKilometers = null;

    #[Assert\Range(
        min:0 ,
        max:500000,
        notInRangeMessage:'Le kilometrage doit etre entre 0 et 500000'
        )]
    public ?int $maxKilometers = null;

    #[Assert\Range(
        min:1900 ,
        max:2024,
        notInRangeMessage:'L\'année doit etre entre 1900 et 2024'
        )]
    public ?int $minYear = null;

    #[Assert\Range(
        min:1900 ,
        max:2024,
        notInRangeMessage:'L\'année doit etre entre 1900 et 2024'
        )]
    public ?int $maxYear = null;
}