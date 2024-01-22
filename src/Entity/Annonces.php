<?php

namespace App\Entity;

use App\Repository\AnnoncesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AnnoncesRepository::class)]
class Annonces
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
     #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:100)]
    private ?string $code = null;

    #[ORM\OneToOne(mappedBy: 'annonceid', cascade: ['persist', 'remove'])]
    private ?Property $property = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getProperty(): ?Property
    {
        return $this->property;
    }

    public function setProperty(Property $property): static
    {
        // set the owning side of the relation if necessary
        if ($property->getAnnonceid() !== $this) {
            $property->setAnnonceid($this);
        }

        $this->property = $property;

        return $this;
    }
}
