<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ApiResource()] // Ajoute cette annotation
class DailyQuest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", length: 100)]
    private $username;

    #[ORM\Column(type: "string", length: 255)]
    private $quest;

    #[ORM\Column(type: "datetime", nullable: true)]
    private $completedAt;

    #[ORM\Column(type: "boolean")]
    private $completed;

    public function getCompleted(): ?bool
    {
        return $this->completed;
    }

    public function setCompleted(bool $completed): self
    {
        $this->completed = $completed;

        return $this;
    }
}
