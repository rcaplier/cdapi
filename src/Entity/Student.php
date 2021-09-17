<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $nicknames = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $power;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $strengths = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $weaknesses = [];

    /**
     * @ORM\ManyToMany(targetEntity=Language::class, mappedBy="students")
     */
    private $favoriteLanguages;

    public function __construct()
    {
        $this->favoriteLanguages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNicknames(): ?array
    {
        return $this->nicknames;
    }

    public function setNicknames(?array $nicknames): self
    {
        $this->nicknames = $nicknames;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPower(): ?string
    {
        return $this->power;
    }

    public function setPower(string $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getStrengths(): ?array
    {
        return $this->strengths;
    }

    public function setStrengths(?array $strengths): self
    {
        $this->strengths = $strengths;

        return $this;
    }

    public function getWeaknesses(): ?array
    {
        return $this->weaknesses;
    }

    public function setWeaknesses(?array $weaknesses): self
    {
        $this->weaknesses = $weaknesses;

        return $this;
    }

    /**
     * @return Collection|Language[]
     */
    public function getFavoriteLanguages(): Collection
    {
        return $this->favoriteLanguages;
    }

    public function addFavoriteLanguage(Language $favoriteLanguage): self
    {
        if (!$this->favoriteLanguages->contains($favoriteLanguage)) {
            $this->favoriteLanguages[] = $favoriteLanguage;
            $favoriteLanguage->addStudent($this);
        }

        return $this;
    }

    public function removeFavoriteLanguage(Language $favoriteLanguage): self
    {
        if ($this->favoriteLanguages->removeElement($favoriteLanguage)) {
            $favoriteLanguage->removeStudent($this);
        }

        return $this;
    }

}
