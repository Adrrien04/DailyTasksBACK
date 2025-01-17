<?php
namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column(name: "img", type: "string", length: 255, nullable: true)]
    private ?string $profileImage = null;

    #[ORM\OneToMany(mappedBy: "user", targetEntity: DailyQuest::class, cascade: ["persist", "remove"])]
    private Collection $dailyQuests;

    public function __construct()
    {
        $this->dailyQuests = new ArrayCollection();
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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;
        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;
        return $this;
    }

    public function getProfileImage(): ?string
    {
        return $this->profileImage;
    }

    public function setProfileImage(?string $profileImage): self
    {
        $this->profileImage = $profileImage;
        return $this;
    }

    public function getDailyQuests(): Collection
    {
        return $this->dailyQuests;
    }

    public function addDailyQuest(DailyQuest $dailyQuest): self
    {
        if (!$this->dailyQuests->contains($dailyQuest)) {
            $this->dailyQuests->add($dailyQuest);
            $dailyQuest->setUser($this);
        }

        return $this;
    }

    public function removeDailyQuest(DailyQuest $dailyQuest): self
    {
        if ($this->dailyQuests->removeElement($dailyQuest)) {
            if ($dailyQuest->getUser() === $this) {
                $dailyQuest->setUser(null);
            }
        }

        return $this;
    }
}
