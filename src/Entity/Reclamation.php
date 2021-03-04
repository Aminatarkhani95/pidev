<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReclamationRepository::class)
 */
class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id_rec;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_rec;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_clt;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_prod;

    /**
     * @ORM\Column(type="integer")
     */
    private $status_rec;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdRec(): ?int
    {
        return $this->id_rec;
    }

    public function setIdRec(int $id_rec): self
    {
        $this->id_rec = $id_rec;

        return $this;
    }

    public function getDescRec(): ?string
    {
        return $this->desc_rec;
    }

    public function setDescRec(string $desc_rec): self
    {
        $this->desc_rec = $desc_rec;

        return $this;
    }

    public function getIdClt(): ?int
    {
        return $this->id_clt;
    }

    public function setIdClt(int $id_clt): self
    {
        $this->id_clt = $id_clt;

        return $this;
    }

    public function getIdProd(): ?int
    {
        return $this->id_prod;
    }

    public function setIdProd(int $id_prod): self
    {
        $this->id_prod = $id_prod;

        return $this;
    }

    public function getStatusRec(): ?int
    {
        return $this->status_rec;
    }

    public function setStatusRec(int $status_rec): self
    {
        $this->status_rec = $status_rec;

        return $this;
    }
}
