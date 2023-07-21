<?php

namespace App\Entity;

use App\Repository\SalaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalaireRepository::class)]
class Salaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $FacturationEncaissee = null;

    #[ORM\Column(length: 255)]
    private ?string $FraisProfessionnels = null;

    #[ORM\Column(length: 255)]
    private ?string $taux = null;

    #[ORM\Column(length: 255)]
    private ?string $FraisGestion = null;

    #[ORM\Column(length: 255)]
    private ?string $MasseSalarial = null;

    #[ORM\Column(length: 255)]
    private ?string $ChargesPatronales = null;

    #[ORM\Column(length: 255)]
    private ?string $ChargesSalariales = null;

    #[ORM\Column(length: 255)]
    private ?string $SalairesBrut = null;

    #[ORM\Column(length: 255)]
    private ?string $SalairesNet = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacturationEncaissee(): ?string
    {
        return $this->FacturationEncaissee;
    }

    public function setFacturationEncaissee(string $FacturationEncaissee): self
    {
        $this->FacturationEncaissee = $FacturationEncaissee;

        return $this;
    }

    public function getFraisProfessionnels(): ?string
    {
        return $this->FraisProfessionnels;
    }

    public function setFraisProfessionnels(string $FraisProfessionnels): self
    {
        $this->FraisProfessionnels = $FraisProfessionnels;

        return $this;
    }

    public function getTaux(): ?string
    {
        return $this->taux;
    }

    public function setTaux(string $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getFraisGestion(): ?string
    {
        return $this->FraisGestion;
    }

    public function setFraisGestion(string $FraisGestion): self
    {
        $this->FraisGestion = $FraisGestion;

        return $this;
    }

    public function getMasseSalarial(): ?string
    {
        return $this->MasseSalarial;
    }

    public function setMasseSalarial(string $MasseSalarial): self
    {
        $this->MasseSalarial = $MasseSalarial;

        return $this;
    }

    public function getChargesPatronales(): ?string
    {
        return $this->ChargesPatronales;
    }

    public function setChargesPatronales(string $ChargesPatronales): self
    {
        $this->ChargesPatronales = $ChargesPatronales;

        return $this;
    }

    public function getChargesSalariales(): ?string
    {
        return $this->ChargesSalariales;
    }

    public function setChargesSalariales(string $ChargesSalariales): self
    {
        $this->ChargesSalariales = $ChargesSalariales;

        return $this;
    }

    public function getSakairesBrut(): ?string
    {
        return $this->SalairesBrut;
    }

    public function setSakairesBrut(string $SakairesBrut): self
    {
        $this->SalairesBrut = $SakairesBrut;

        return $this;
    }

    public function getSalairesNet(): ?string
    {
        return $this->SalairesNet;
    }

    public function setSalairesNet(string $SalairesNet): self
    {
        $this->SalairesNet = $SalairesNet;

        return $this;
    }
}
