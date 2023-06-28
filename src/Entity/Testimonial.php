<?php

namespace App\Entity;

use App\Repository\TestimonialRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestimonialRepository::class)]
/**
 * Summary of Testimonial
 */
class Testimonial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    /**
     * Summary of id
     * @var 
     */
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
     * Summary of name
     * @var 
     */
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    /**
     * Summary of content
     * @var 
     */
    private ?string $content = null;

    #[ORM\Column]
    /**
     * Summary of note
     * @var 
     */
    private ?int $note = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    /**
     * Summary of getId
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Summary of getName
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Summary of setName
     * @param string $name
     * @return Testimonial
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Summary of getContent
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Summary of setContent
     * @param string $content
     * @return Testimonial
     */
    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Summary of getNote
     * @return int|null
     */
    public function getNote(): ?int
    {
        return $this->note;
    }

    /**
     * Summary of setNote
     * @param int $note
     * @return Testimonial
     */
    public function setNote(int $note): static
    {
        $this->note = $note;

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
}
