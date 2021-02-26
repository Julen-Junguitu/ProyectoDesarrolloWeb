<?php

namespace App\Entity;

use App\Repository\UsuarioDispositivoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsuarioDispositivoRepository::class)
 */
class UsuarioDispositivo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="UsuariosDispositivos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Usuario;

    /**
     * @ORM\ManyToOne(targetEntity=Dispositivo::class, inversedBy="UsuariosDispositivos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Dispositivo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->Usuario;
    }

    public function setUsuario(?Usuario $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function getDispositivo(): ?Dispositivo
    {
        return $this->Dispositivo;
    }

    public function setDispositivo(?Dispositivo $Dispositivo): self
    {
        $this->Dispositivo = $Dispositivo;

        return $this;
    }
}
