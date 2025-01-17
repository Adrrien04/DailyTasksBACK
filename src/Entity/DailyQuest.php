<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DailyQuestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: DailyQuestRepository::class)]
class DailyQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "dailyQuests")]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: Quest::class)]
    private ?Quest $quest = null;

    #[ORM\Column(type: "boolean")]
    private bool $done = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getQuest(): ?Quest
    {
        return $this->quest;
    }

    public function setQuest(?Quest $quest): self
    {
        $this->quest = $quest;
        return $this;
    }

    public function isDone(): bool
    {
        return $this->done;
    }

    public function setDone(bool $done): self
    {
        $this->done = $done;
        return $this;
    }
}
