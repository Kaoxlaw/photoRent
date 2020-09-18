<?php

namespace App\Entity;

use App\Repository\RentEquipmentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass=RentEquipmentsRepository::class)
 */
class RentEquipments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $number_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $availible;

    /**
     * @ORM\Column(type="text")
     */
    private $pictures;

    /**
     * @Vich\UploadableField(mapping="rentEquipments_images", fileNameProperty="pictures")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=MakeItRent::class, mappedBy="rentEquipments")
     */
    private $makeItRents;

    public function __construct()
    {
        $this->makeItRents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getNumberId(): ?string
    {
        return $this->number_id;
    }

    public function setNumberId(string $number_id): self
    {
        $this->number_id = $number_id;

        return $this;
    }

    public function getAvailible(): ?bool
    {
        return $this->availible;
    }

    public function setAvailible(bool $availible): self
    {
        $this->availible = $availible;

        return $this;
    }

    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    public function setPictures(?string $pictures): self
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection|MakeItRent[]
     */
    public function getMakeItRents(): Collection
    {
        return $this->makeItRents;
    }

    public function addMakeItRent(MakeItRent $makeItRent): self
    {
        if (!$this->makeItRents->contains($makeItRent)) {
            $this->makeItRents[] = $makeItRent;
            $makeItRent->setRentEquipments($this);
        }

        return $this;
    }

    public function removeMakeItRent(MakeItRent $makeItRent): self
    {
        if ($this->makeItRents->contains($makeItRent)) {
            $this->makeItRents->removeElement($makeItRent);
            // set the owning side to null (unless already changed)
            if ($makeItRent->getRentEquipments() === $this) {
                $makeItRent->setRentEquipments(null);
            }
        }

        return $this;
    }
}
