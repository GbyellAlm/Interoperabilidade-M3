<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AeronaveRepository")
 */
class Aeronave
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
    private $prefixo;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $modelo;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacidade;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrefixo(): ?string
    {
        return $this->prefixo;
    }

    public function setPrefixo(string $prefixo): self
    {
        $this->prefixo = $prefixo;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getCapacidade(): ?int
    {
        return $this->capacidade;
    }

    public function setCapacidade(int $capacidade): self
    {
        $this->capacidade = $capacidade;

        return $this;
    }
}
