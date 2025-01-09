<?php

namespace App\Entity;

use App\Repository\QuestRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource; // Importer cette classe

#[ORM\Entity(repositoryClass: QuestRepository::class)]
#[ApiResource] // Ajout de l'annotation ApiResource pour exposer l'entité dans l'API
class Quest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $difficulte = null;

    #[ORM\Column]
    private ?bool $reccurente = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $lastRealisation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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

    public function getDifficulte(): ?int
    {
        return $this->difficulte;
    }

    public function setDifficulte(int $difficulte): static
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    public function isReccurente(): ?bool
    {
        return $this->reccurente;
    }

    public function setReccurente(bool $reccurente): static
    {
        $this->reccurente = $reccurente;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getLastRealisation(): ?\DateTimeImmutable
    {
        return $this->lastRealisation;
    }

    public function setLastRealisation(\DateTimeImmutable $lastRealisation): static
    {
        $this->lastRealisation = $lastRealisation;

        return $this;
    }
}
