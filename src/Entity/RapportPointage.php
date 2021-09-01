<?php

namespace App\Entity;

use App\Entity\Employe;
use App\Repository\RapportPointageRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ORM\Entity(repositoryClass=RapportPointageRepository::class)
 * @ApiResource(formats ={"json"})
 *  @ApiFilter(SearchFilter::class, properties= {"IdEmploye" :"exact"})
 */
class RapportPointage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="float")
     */
    private $HeuresParJour;

    /**
     * @ORM\Column(type="float")
     */
    private $HeuresParMois;

    /**
     * @ORM\Column(type="integer")
     */
    private $JoursParSemaine;

  


 

    /**
     * @ORM\ManyToOne(targetEntity=Employe::class, inversedBy="rapportPointages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Employe;

    /**
     * @ORM\Column(type="time")
     */
    private $PointageEntree;

    /**
     * @ORM\Column(type="time")
     */
    private $PointageSortie;

    /**
     * @ORM\Column(type="time")
     */
    private $Retard;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Remarque;


    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getHeuresParJour(): ?float
    {
        return $this->HeuresParJour;
    }

    public function setHeuresParJour(float $HeuresParJour): self
    {
        $this->HeuresParJour = $HeuresParJour;

        return $this;
    }

    public function getHeuresParMois(): ?float
    {
        return $this->HeuresParMois;
    }

    public function setHeuresParMois(float $HeuresParMois): self
    {
        $this->HeuresParMois = $HeuresParMois;

        return $this;
    }

    public function getJoursParSemaine(): ?int
    {
        return $this->JoursParSemaine;
    }

    public function setJoursParSemaine(int $JoursParSemaine): self
    {
        $this->JoursParSemaine = $JoursParSemaine;

        return $this;
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

    public function getPointageEntree(): ?\DateTimeInterface
    {
        return $this->PointageEntree;
    }

    public function setPointageEntree(\DateTimeInterface $PointageEntree): self
    {
        $this->PointageEntree = $PointageEntree;

        return $this;
    }

    public function getPointageSortie(): ?\DateTimeInterface
    {
        return $this->PointageSortie;
    }

    public function setPointageSortie(\DateTimeInterface $PointageSortie): self
    {
        $this->PointageSortie = $PointageSortie;

        return $this;
    }

    public function getRetard(): ?\DateTimeInterface
    {
        return $this->Retard;
    }

    public function setRetard(\DateTimeInterface $Retard): self
    {
        $this->Retard = $Retard;

        return $this;
    }

    public function getRemarque(): ?string
    {
        return $this->Remarque;
    }

    public function setRemarque(?string $Remarque): self
    {
        $this->Remarque = $Remarque;

        return $this;
    }

}
