<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssentoRepository")
 */
class Assento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $codAssento;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeronave")
     */
    private $aeronave;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodAssento(): ?string
    {
        return $this->codAssento;
    }

    public function setCodAssento(string $codAssento): self
    {
        $this->codAssento = $codAssento;

        return $this;
    }

    public function getAeronave(): ?Aeronave
    {
        return $this->aeronave;
    }

    public function setAeronave(?Aeronave $aeronave): self
    {
        $this->aeronave = $aeronave;

        return $this;
    }
}
