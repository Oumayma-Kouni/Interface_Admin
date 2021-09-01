<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FicheRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=FicheRepository::class)
 *  @ApiResource(formats ={"json"})
 * @ApiFilter(SearchFilter::class, properties= {"id" : "ipartial"})
 */

class Fiche
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="fiches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Employe;

    

    /**
     * @ORM\Column(type="float")
     */
    private $NbreHeuresTravail;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePaiement;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePaie;

    /**
     * @ORM\Column(type="float")
     */
    private $SalaireBase;

    /**
     * @ORM\Column(type="float")
     */
    private $HeuresSupplementaires;

    /**
     * @ORM\Column(type="float")
     */
    private $Prime;

    /**
     * @ORM\Column(type="float")
     */
    private $IndemniteDeTransport;


    /**
     * @ORM\Column(type="float")
     */
    private $Impots;

    

    /**
     * @ORM\Column(type="float")
     */
    private $Avance;
    /**
     * @ORM\Column(type="float")
     */
    private $IndemniteSupplementaires;

    public function __construct()
    {
        
    }
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmploye(): ?Employe
    {
        return $this->Employe;
    }

    public function setEmploye(?Employe $Employe): self
    {
        $this->Employe = $Employe;

        return $this;
    }

    
    public function getNbreHeuresTravail(): ?float
    {
        return $this->NbreHeuresTravail;
    }

    public function setNbreHeuresTravail(float $NbreHeuresTravail): self
    {
        $this->NbreHeuresTravail = $NbreHeuresTravail;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->DatePaiement;
    }

    public function setDatePaiement(\DateTimeInterface $DatePaiement): self
    {
        $this->DatePaiement = $DatePaiement;

        return $this;
    }
    
    public function __toString()
    {
        return $this->getId();
    }

    public function getDatePaie(): ?\DateTimeInterface
    {
        return $this->DatePaie;
    }

    public function setDatePaie(\DateTimeInterface $DatePaie): self
    {
        $this->DatePaie = $DatePaie;

        return $this;
    }

    public function getSalaireBase(): ?float
    {
        return $this->SalaireBase;
    }

    public function setSalaireBase(float $SalaireBase): self
    {
        $this->SalaireBase = $SalaireBase;

        return $this;
    }


    public function getHeuresSupplementaires(): ?float
    {
        return $this->HeuresSupplementaires;
    }

    public function setHeuresSupplementaires(float $HeuresSupplementaires): self
    {
        $this->HeuresSupplementaires = $HeuresSupplementaires;

        return $this;
    }

    public function getPrime(): ?float
    {
        return $this->Prime;
    }

    public function setPrime(float $Prime): self
    {
        $this->Prime = $Prime;

        return $this;
    }

    public function getIndemniteDeTransport(): ?float
    {
        return $this->IndemniteDeTransport;
    }

    public function setIndemniteDeTransport(float $IndemniteDeTransport): self
    {
        $this->IndemniteDeTransport = $IndemniteDeTransport;

        return $this;
    }

  

    public function getImpots(): ?float
    {
        return $this->Impots;
    }

    public function setImpots(float $Impots): self
    {
        $this->Impots = $Impots;

        return $this;
    }

   

    public function getAvance(): ?float
    {
        return $this->Avance;
    }

    public function setAvance(float $Avance): self
    {
        $this->Avance = $Avance;

        return $this;
    }

    public function getIndemniteSupplementaires(): ?float
    {
        return $this->IndemniteSupplementaires;
    }

    public function setIndemniteSupplementaires(float $IndemniteSupplementaires): self
    {
        $this->IndemniteSupplementaires = $IndemniteSupplementaires;

        return $this;
    }

    
  
  
}
