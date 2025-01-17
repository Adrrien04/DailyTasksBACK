<?php

namespace App\Entity;

use App\Repository\AchievementUserRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: AchievementUserRepository::class)]
#[ApiResource] // Ajout de l'annotation ApiResource pour exposer l'entité dans l'API
class AchievementUser
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'achievementUsers')]
    private ?Achievement $achievement = null;

    #[ORM\ManyToOne(inversedBy: 'achievementUsers')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAchievement(): ?Achievement
    {
        return $this->achievement;
    }

    public function setAchievement(?Achievement $achievement): static
    {
        $this->achievement = $achievement;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
