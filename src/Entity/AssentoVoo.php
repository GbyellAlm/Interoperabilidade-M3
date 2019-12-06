<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssentoVooRepository")
 */
class AssentoVoo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Assento", cascade={"persist", "remove"})
     */
    private $assento;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Passageiro")
     */
    private $passageiro;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voo")
     */
    private $voo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAssento(): ?Assento
    {
        return $this->assento;
    }

    public function setAssento(?Assento $assento): self
    {
        $this->assento = $assento;

        return $this;
    }

    public function getPassageiro(): ?Passageiro
    {
        return $this->passageiro;
    }

    public function setPassageiro(?Passageiro $passageiro): self
    {
        $this->passageiro = $passageiro;

        return $this;
    }

    public function getVoo(): ?Voo
    {
        return $this->voo;
    }

    public function setVoo(?Voo $voo): self
    {
        $this->voo = $voo;

        return $this;
    }
}
