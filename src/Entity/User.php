<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource; // N'oublie pas d'importer cette classe

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource] // Ajout de l'annotation ApiResource pour exposer l'entité dans l'API
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $roles = null;

    /**
     * @var Collection<int, Badge>
     */
    #[ORM\OneToMany(targetEntity: Badge::class, mappedBy: 'user')]
    private Collection $badges;

    /**
     * @var Collection<int, AchievementUser>
     */
    #[ORM\OneToMany(targetEntity: AchievementUser::class, mappedBy: 'user')]
    private Collection $achievementUsers;

    public function __construct()
    {
        $this->badges = new ArrayCollection();
        $this->achievementUsers = new ArrayCollection();
    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection<int, Badge>
     */
    public function getBadges(): Collection
    {
        return $this->badges;
    }

    public function addBadge(Badge $badge): static
    {
        if (!$this->badges->contains($badge)) {
            $this->badges->add($badge);
            $badge->setUser($this);
        }

        return $this;
    }

    public function removeBadge(Badge $badge): static
    {
        if ($this->badges->removeElement($badge)) {
            // set the owning side to null (unless already changed)
            if ($badge->getUser() === $this) {
                $badge->setUser(null);
            }
        }

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
            $achievementUser->setUser($this);
        }

        return $this;
    }

    public function removeAchievementUser(AchievementUser $achievementUser): static
    {
        if ($this->achievementUsers->removeElement($achievementUser)) {
            // set the owning side to null (unless already changed)
            if ($achievementUser->getUser() === $this) {
                $achievementUser->setUser(null);
            }
        }

        return $this;
    }
}
