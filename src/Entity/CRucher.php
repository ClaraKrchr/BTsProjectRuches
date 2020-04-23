<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CRucherRepository")
 */
class CRucher
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $nb_ruches;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

#=======================GETTERS========================#

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function getNbRuches(): ?int
    {
        return $this->nb_ruches;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

#========================SETTERS=======================#

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function setNbRuches(?int $nb_ruches): self
    {
        $this->nb_ruches = $nb_ruches;

        return $this;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
}
