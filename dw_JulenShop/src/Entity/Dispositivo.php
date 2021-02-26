<?php

namespace App\Entity;

use App\Repository\DispositivoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DispositivoRepository::class)
 */
class Dispositivo
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
    private $Modelo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Marca;

    /**
     * @ORM\Column(type="float")
     */
    private $Coste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Imagen;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="Dispositivos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Categoria;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioDispositivo::class, mappedBy="Dispositivo")
     */
    private $UsuariosDispositivos;

    public function __construct()
    {
        $this->UsuariosDispositivos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelo(): ?string
    {
        return $this->Modelo;
    }

    public function setModelo(string $Modelo): self
    {
        $this->Modelo = $Modelo;

        return $this;
    }

    public function getMarca(): ?string
    {
        return $this->Marca;
    }

    public function setMarca(string $Marca): self
    {
        $this->Marca = $Marca;

        return $this;
    }

    public function getCoste(): ?float
    {
        return $this->Coste;
    }

    public function setCoste(float $Coste): self
    {
        $this->Coste = $Coste;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->Imagen;
    }

    public function setImagen(string $Imagen): self
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->Categoria;
    }

    public function setCategoria(?Categoria $Categoria): self
    {
        $this->Categoria = $Categoria;

        return $this;
    }

    /**
     * @return Collection|UsuarioDispositivo[]
     */
    public function getUsuariosDispositivos(): Collection
    {
        return $this->UsuariosDispositivos;
    }

    public function addUsuariosDispositivo(UsuarioDispositivo $usuariosDispositivo): self
    {
        if (!$this->UsuariosDispositivos->contains($usuariosDispositivo)) {
            $this->UsuariosDispositivos[] = $usuariosDispositivo;
            $usuariosDispositivo->setDispositivo($this);
        }

        return $this;
    }

    public function removeUsuariosDispositivo(UsuarioDispositivo $usuariosDispositivo): self
    {
        if ($this->UsuariosDispositivos->removeElement($usuariosDispositivo)) {
            // set the owning side to null (unless already changed)
            if ($usuariosDispositivo->getDispositivo() === $this) {
                $usuariosDispositivo->setDispositivo(null);
            }
        }

        return $this;
    }
}
