<?php

namespace App\Entity;

use App\Repository\VendeurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VendeurRepository::class)
 */
class Vendeur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_ven;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_ven;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_ven;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVen(): ?int
    {
        return $this->id_ven;
    }

    public function setIdVen(int $id_ven): self
    {
        $this->id_ven = $id_ven;

        return $this;
    }

    public function getDescVen(): ?string
    {
        return $this->desc_ven;
    }

    public function setDescVen(string $desc_ven): self
    {
        $this->desc_ven = $desc_ven;

        return $this;
    }

    public function getImageVen(): ?string
    {
        return $this->image_ven;
    }

    public function setImageVen(string $image_ven): self
    {
        $this->image_ven = $image_ven;

        return $this;
    }
}
