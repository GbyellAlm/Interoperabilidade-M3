<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AeroportoRepository")
 */
class Aeroporto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $sigla;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $cidade;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(?string $sigla): self
    {
        $this->sigla = $sigla;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }
}
