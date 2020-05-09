<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AssociationRuchePeserucheRepository")
 */
class AssociationRuchePeseruche
{

    /**
     * @ORM\Id()
     * @ORM\OneToOne(targetEntity="App\Entity\CRuche", inversedBy="associationRuchePeseruche", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ruche;

    /**
     * @ORM\Id()
     * @ORM\OneToOne(targetEntity="App\Entity\CPeseRuche", inversedBy="associationRuchePeseruche", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $peseruche;

    public function getRuche(): ?CRuche
    {
        return $this->ruche;
    }

    public function setRuche(CRuche $ruche): self
    {
        $this->ruche = $ruche;

        return $this;
    }

    public function getPeseruche(): ?CPeseRuche
    {
        return $this->peseruche;
    }

    public function setPeseruche(CPeseRuche $peseruche): self
    {
        $this->peseruche = $peseruche;

        return $this;
    }
}