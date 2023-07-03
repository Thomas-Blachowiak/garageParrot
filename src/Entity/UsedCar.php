<?php

namespace App\Entity;

use App\Repository\UsedCarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsedCarRepository::class)]
class UsedCar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column]
    private ?int $kilometer = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $caracteristics = null;

    #[ORM\Column(length: 100)]
    private ?string $energy = null;

    #[ORM\Column(length: 255)]
    
    private ?string $image;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

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

    public function getKilometer(): ?int
    {
        return $this->kilometer;
    }

    public function setKilometer(int $kilometer): static
    {
        $this->kilometer = $kilometer;

        return $this;
    }

    public function getCaracteristics(): ?string
    {
        return $this->caracteristics;
    }

    public function setCaracteristics(string $caracteristics): static
    {
        $this->caracteristics = $caracteristics;

        return $this;
    }

    public function getEnergy(): ?string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): static
    {
        $this->energy = $energy;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
