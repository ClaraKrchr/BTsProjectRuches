<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CStationRepository")
 */
class CStation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\AssociationStationRucher", mappedBy="station", cascade={"persist", "remove"})
     */
    private $associationStationRucher;

    /**
     * @ORM\Column(type="date")
     */
    private $dateinstall;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $idstation;

    public function __construct()
    {
        $this->associationPeserucheStations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAssociationStationRucher(): ?AssociationStationRucher
    {
        return $this->associationStationRucher;
    }

    public function setAssociationStationRucher(AssociationStationRucher $associationStationRucher): self
    {
        $this->associationStationRucher = $associationStationRucher;

        // set the owning side of the relation if necessary
        if ($associationStationRucher->getStation() !== $this) {
            $associationStationRucher->setStation($this);
        }

        return $this;
    }

    public function getDateinstall(): ?\DateTimeInterface
    {
        return $this->dateinstall;
    }

    public function setDateinstall(\DateTimeInterface $dateinstall): self
    {
        $this->dateinstall = $dateinstall;

        return $this;
    }

    public function getIdstation(): ?string
    {
        return $this->idstation;
    }

    public function setIdstation(?string $idstation): self
    {
        $this->idstation = $idstation;

        return $this;
    }

}
