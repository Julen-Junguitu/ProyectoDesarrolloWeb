<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario
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
    private $Usuario;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Contrasena;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Admin;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioDispositivo::class, mappedBy="Usuario")
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

    public function getUsuario(): ?string
    {
        return $this->Usuario;
    }

    public function setUsuario(string $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function getContrasena(): ?string
    {
        return $this->Contrasena;
    }

    public function setContrasena(string $Contrasena): self
    {
        $this->Contrasena = $Contrasena;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->Admin;
    }

    public function setAdmin(bool $Admin): self
    {
        $this->Admin = $Admin;

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
            $usuariosDispositivo->setUsuario($this);
        }

        return $this;
    }

    public function removeUsuariosDispositivo(UsuarioDispositivo $usuariosDispositivo): self
    {
        if ($this->UsuariosDispositivos->removeElement($usuariosDispositivo)) {
            // set the owning side to null (unless already changed)
            if ($usuariosDispositivo->getUsuario() === $this) {
                $usuariosDispositivo->setUsuario(null);
            }
        }

        return $this;
    }
}
