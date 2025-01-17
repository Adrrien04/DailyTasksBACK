<?php

namespace App\Entity;

use App\Repository\AchievementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AchievementRepository::class)]
class Achievement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateAccomplissement = null;

    #[ORM\Column]
    private ?int $points = null;

    /**
     * @var Collection<int, AchievementUser>
     */
    #[ORM\OneToMany(targetEntity: AchievementUser::class, mappedBy: 'achievement')]
    private Collection $achievementUsers;

    public function __construct()
    {
        $this->achievementUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAccomplissement(): ?\DateTimeInterface
    {
        return $this->dateAccomplissement;
    }

    public function setDateAccomplissement(\DateTimeInterface $dateAccomplissement): static
    {
        $this->dateAccomplissement = $dateAccomplissement;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): static
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return Collection<int, AchievementUser>
     */
    public function getAchievementUsers(): Collection
    {
        return $this->achievementUsers;
    }

    public function addAchievementUser(AchievementUser $achievementUser): static
    {
        if (!$this->achievementUsers->contains($achievementUser)) {
            $this->achievementUsers->add($achievementUser);
            $achievementUser->setAchievement($this);
        }

        return $this;
    }

    public function removeAchievementUser(AchievementUser $achievementUser): static
    {
        if ($this->achievementUsers->removeElement($achievementUser)) {

            if ($achievementUser->getAchievement() === $this) {
                $achievementUser->setAchievement(null);
            }
        }

        return $this;
    }
}
