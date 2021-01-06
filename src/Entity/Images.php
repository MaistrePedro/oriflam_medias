<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImagesRepository::class)
 */
class Images
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $extension;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=true)
     */
    private $linkedOrder;

    /**
     * @ORM\OneToOne(targetEntity=Product::class, inversedBy="image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $linkedProduct;

    /**
     * @ORM\OneToOne(targetEntity=Category::class, inversedBy="image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $linkedCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getLinkedOrder(): ?Order
    {
        return $this->linkedOrder;
    }

    public function setLinkedOrder(?Order $linkedOrder): self
    {
        $this->linkedOrder = $linkedOrder;

        return $this;
    }

    public function getLinkedProduct(): ?Product
    {
        return $this->linkedProduct;
    }

    public function setLinkedProduct(?Product $linkedProduct): self
    {
        $this->linkedProduct = $linkedProduct;

        return $this;
    }

    public function getLinkedCategory(): ?Category
    {
        return $this->linkedCategory;
    }

    public function setLinkedCategory(?Category $linkedCategory): self
    {
        $this->linkedCategory = $linkedCategory;

        return $this;
    }
}
