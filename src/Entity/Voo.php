<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VooRepository")
 */
class Voo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $numero;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qtdeEscalas;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dataSaida;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $dataChegada;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeronave")
     */
    private $aeronave;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroporto")
     */
    private $aeroportoOrigem;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Aeroporto")
     */
    private $aeroportoDestino;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getQtdeEscalas(): ?int
    {
        return $this->qtdeEscalas;
    }

    public function setQtdeEscalas(?int $qtdeEscalas): self
    {
        $this->qtdeEscalas = $qtdeEscalas;

        return $this;
    }

    public function getDataSaida(): ?string
    {
        return $this->dataSaida;
    }

    public function setDataSaida(string $dataSaida): self
    {
        $this->dataSaida = $dataSaida;

        return $this;
    }

    public function getDataChegada(): ?string
    {
        return $this->dataChegada;
    }

    public function setDataChegada(string $dataChegada): self
    {
        $this->dataChegada = $dataChegada;

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

    public function getAeroportoOrigem(): ?Aeroporto
    {
        return $this->aeroportoOrigem;
    }

    public function setAeroportoOrigem(?Aeroporto $aeroportoOrigem): self
    {
        $this->aeroportoOrigem = $aeroportoOrigem;

        return $this;
    }

    public function getAeroportoDestino(): ?Aeroporto
    {
        return $this->aeroportoDestino;
    }

    public function setAeroportoDestino(?Aeroporto $aeroportoDestino): self
    {
        $this->aeroportoDestino = $aeroportoDestino;

        return $this;
    }
}
