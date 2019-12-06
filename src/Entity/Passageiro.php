<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PassageiroRepository")
 */
class Passageiro
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomeComp;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $cpf;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idade;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $codReserva;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Voo")
     */
    private $voo;

    public function __construct()
    {
        $this->voo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomeComp(): ?string
    {
        return $this->nomeComp;
    }

    public function setNomeComp(string $nomeComp): self
    {
        $this->nomeComp = $nomeComp;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getIdade(): ?int
    {
        return $this->idade;
    }

    public function setIdade(?int $idade): self
    {
        $this->idade = $idade;

        return $this;
    }

    public function getCodReserva(): ?string
    {
        return $this->codReserva;
    }

    public function setCodReserva(?string $codReserva): self
    {
        $this->codReserva = $codReserva;

        return $this;
    }
    
    public function getVoo(): ?int
    {
        return $this->$voo;
    }

    public function setVoo(?int $voo): self
    {
        $this->voo = $voo;

        return $this;
    }
}
