<?php

namespace App\Entity;

use App\Repository\OpeningDaysRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningDaysRepository::class)]
class OpeningDays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $days = null;

    #[ORM\Column(length: 100)]
    private ?string $open = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(string $days): static
    {
        $this->days = $days;

        return $this;
    }

    public function getOpen(): ?string
    {
        return $this->open;
    }

    public function setOpen(string $open): static
    {
        $this->open = $open;

        return $this;
    }
}
