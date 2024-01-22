<?php

namespace App\Entity;

use App\Repository\InstallationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: InstallationsRepository::class)]
class Installations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $internet = null;

    #[ORM\Column(nullable: true)]
    private ?bool $climatisation = null;

    #[ORM\Column(nullable: true)]
    private ?bool $balcon = null;

    #[ORM\Column(nullable: true)]
    private ?bool $garage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $salle_sport = null;

    #[ORM\Column(nullable: true)]
    private ?bool $parking = null;

    #[ORM\Column(nullable: true)]
    private ?bool $animaux_accepte = null;

    #[ORM\Column(nullable: true)]
    private ?bool $piscine = null;

    #[ORM\Column(nullable: true)]
    private ?bool $bar = null;

    #[ORM\Column(nullable: true)]
    private ?bool $television = null;

    #[ORM\Column(nullable: true)]
    private ?bool $heater = null;

    #[ORM\Column(nullable: true)]
    private ?bool $cuisine = null;

    #[ORM\Column(nullable: true)]
    private ?bool $security_cam = null;

    #[ORM\ManyToMany(targetEntity: Property::class, mappedBy: 'installationid')]
    private Collection $properties;

    public function __construct()
    {
        $this->properties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(?bool $internet): static
    {
        $this->internet = $internet;

        return $this;
    }

    public function isClimatisation(): ?bool
    {
        return $this->climatisation;
    }

    public function setClimatisation(?bool $climatisation): static
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    public function isBalcon(): ?bool
    {
        return $this->balcon;
    }

    public function setBalcon(?bool $balcon): static
    {
        $this->balcon = $balcon;

        return $this;
    }

    public function isGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(?bool $garage): static
    {
        $this->garage = $garage;

        return $this;
    }

    public function isSalleSport(): ?bool
    {
        return $this->salle_sport;
    }

    public function setSalleSport(?bool $salle_sport): static
    {
        $this->salle_sport = $salle_sport;

        return $this;
    }

    public function isParking(): ?bool
    {
        return $this->parking;
    }

    public function setParking(?bool $parking): static
    {
        $this->parking = $parking;

        return $this;
    }

    public function isAnimauxAccepte(): ?bool
    {
        return $this->animaux_accepte;
    }

    public function setAnimauxAccepte(?bool $animaux_accepte): static
    {
        $this->animaux_accepte = $animaux_accepte;

        return $this;
    }

    public function isPiscine(): ?bool
    {
        return $this->piscine;
    }

    public function setPiscine(?bool $piscine): static
    {
        $this->piscine = $piscine;

        return $this;
    }

    public function isBar(): ?bool
    {
        return $this->bar;
    }

    public function setBar(?bool $bar): static
    {
        $this->bar = $bar;

        return $this;
    }

    public function isTelevision(): ?bool
    {
        return $this->television;
    }

    public function setTelevision(?bool $television): static
    {
        $this->television = $television;

        return $this;
    }

    public function isHeater(): ?bool
    {
        return $this->heater;
    }

    public function setHeater(?bool $heater): static
    {
        $this->heater = $heater;

        return $this;
    }

    public function isCuisine(): ?bool
    {
        return $this->cuisine;
    }

    public function setCuisine(?bool $cuisine): static
    {
        $this->cuisine = $cuisine;

        return $this;
    }

    public function isSecurityCam(): ?bool
    {
        return $this->security_cam;
    }

    public function setSecurityCam(?bool $security_cam): static
    {
        $this->security_cam = $security_cam;

        return $this;
    }

    /**
     * @return Collection<int, Property>
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Property $property): static
    {
        if (!$this->properties->contains($property)) {
            $this->properties->add($property);
            $property->addInstallationid($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): static
    {
        if ($this->properties->removeElement($property)) {
            $property->removeInstallationid($this);
        }

        return $this;
    }
}
