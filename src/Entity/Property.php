<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: PropertyRepository::class)]
class Property
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
      #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?float $surface = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:255)]
    private ?string $status = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank()]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?float $price = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?int $num_rooms = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?int $num_bathrooms = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?int $num_parkings = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?int $num_stage = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    #[Assert\Positive()]
    private ?int $nomero_stage = null;

    #[ORM\Column(type: Types::BINARY)]
    #[Assert\NotNull()]
    #[Assert\Image(
        minWidth: 200,
        maxWidth: 400,
        minHeight: 200,
        maxHeight: 400,
    )]
    private $image = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(inversedBy: 'property', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Annonces $annonceid = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorys $categoryid = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $typeid = null;

    #[ORM\ManyToOne(inversedBy: 'properties')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Localisation $locationid = null;

    #[ORM\ManyToMany(targetEntity: Installations::class, inversedBy: 'properties')]
    private Collection $installationid;

    public function __construct()
    {
        $this->installationid = new ArrayCollection();
        $this->locationid = new ArrayCollection();
        $this->typeid = new ArrayCollection();
        $this->categoryid = new ArrayCollection();
        $this->annonceid = new ArrayCollection();
        $this->createdAt = new DateTimeImmutable();
         $this->updatedAt = new DateTimeImmutable();
    }

     #[ORM\PrePersist]
     public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getNumRooms(): ?int
    {
        return $this->num_rooms;
    }

    public function setNumRooms(int $num_rooms): static
    {
        $this->num_rooms = $num_rooms;

        return $this;
    }

    public function getNumBathrooms(): ?int
    {
        return $this->num_bathrooms;
    }

    public function setNumBathrooms(int $num_bathrooms): static
    {
        $this->num_bathrooms = $num_bathrooms;

        return $this;
    }

    public function getNumParkings(): ?int
    {
        return $this->num_parkings;
    }

    public function setNumParkings(int $num_parkings): static
    {
        $this->num_parkings = $num_parkings;

        return $this;
    }

    public function getNumStage(): ?int
    {
        return $this->num_stage;
    }

    public function setNumStage(int $num_stage): static
    {
        $this->num_stage = $num_stage;

        return $this;
    }

    public function getNomeroStage(): ?int
    {
        return $this->nomero_stage;
    }

    public function setNomeroStage(int $nomero_stage): static
    {
        $this->nomero_stage = $nomero_stage;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAnnonceid(): ?Annonces
    {
        return $this->annonceid;
    }

    public function setAnnonceid(Annonces $annonceid): static
    {
        $this->annonceid = $annonceid;

        return $this;
    }

    public function getCategoryid(): ?Categorys
    {
        return $this->categoryid;
    }

    public function setCategoryid(?Categorys $categoryid): static
    {
        $this->categoryid = $categoryid;

        return $this;
    }

    public function getTypeid(): ?Type
    {
        return $this->typeid;
    }

    public function setTypeid(?Type $typeid): static
    {
        $this->typeid = $typeid;

        return $this;
    }

    public function getLocationid(): ?Localisation
    {
        return $this->locationid;
    }

    public function setLocationid(?Localisation $locationid): static
    {
        $this->locationid = $locationid;

        return $this;
    }

    /**
     * @return Collection<int, Installations>
     */
    public function getInstallationid(): Collection
    {
        return $this->installationid;
    }

    public function addInstallationid(Installations $installationid): static
    {
        if (!$this->installationid->contains($installationid)) {
            $this->installationid->add($installationid);
        }

        return $this;
    }

    public function removeInstallationid(Installations $installationid): static
    {
        $this->installationid->removeElement($installationid);

        return $this;
    }
}
