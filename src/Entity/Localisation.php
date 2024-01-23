<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\LocalisationRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: LocalisationRepository::class)]
class Localisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
     #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?int $nomero_way = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $name_way = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $type_way = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $city = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?int $zipecode = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $departement = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $region = null;
    #[ORM\Column(type: Types::BINARY)]
    #[Assert\NotNull()]
    #[Assert\Image(
        minWidth: 200,
        maxWidth: 400,
        minHeight: 200,
        maxHeight: 400,
    )]
    private $map = null;

    #[ORM\OneToMany(mappedBy: 'locationid', targetEntity: Property::class)]
    private Collection $properties;

    public function __construct()
    {
        $this->properties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeroWay(): ?int
    {
        return $this->nomero_way;
    }

    public function setNomeroWay(int $nomero_way): static
    {
        $this->nomero_way = $nomero_way;

        return $this;
    }

    public function getNameWay(): ?string
    {
        return $this->name_way;
    }

    public function setNameWay(string $name_way): static
    {
        $this->name_way = $name_way;

        return $this;
    }

    public function getTypeWay(): ?string
    {
        return $this->type_way;
    }

    public function setTypeWay(string $type_way): static
    {
        $this->type_way = $type_way;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getZipecode(): ?int
    {
        return $this->zipecode;
    }

    public function setZipecode(int $zipecode): static
    {
        $this->zipecode = $zipecode;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

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
            $property->setLocationid($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): static
    {
        if ($this->properties->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getLocationid() === $this) {
                $property->setLocationid(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set the value of map
     */
    public function setMap($map): self
    {
        $this->map = $map;

        return $this;
    }
}
