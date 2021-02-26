<?php

namespace App\Entity;

use App\Repository\CategoriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriaRepository::class)
 */
class Categoria
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
    private $Nombre;

    /**
     * @ORM\OneToMany(targetEntity=Dispositivo::class, mappedBy="Categoria")
     */
    private $Dispositivos;

    public function __construct()
    {
        $this->Dispositivos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * @return Collection|Dispositivo[]
     */
    public function getDispositivos(): Collection
    {
        return $this->Dispositivos;
    }

    public function addDispositivo(Dispositivo $dispositivo): self
    {
        if (!$this->Dispositivos->contains($dispositivo)) {
            $this->Dispositivos[] = $dispositivo;
            $dispositivo->setCategoria($this);
        }

        return $this;
    }

    public function removeDispositivo(Dispositivo $dispositivo): self
    {
        if ($this->Dispositivos->removeElement($dispositivo)) {
            // set the owning side to null (unless already changed)
            if ($dispositivo->getCategoria() === $this) {
                $dispositivo->setCategoria(null);
            }
        }

        return $this;
    }
}
