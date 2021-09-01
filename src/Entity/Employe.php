<?php

namespace App\Entity;

use App\Repository\EmployeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=EmployeRepository::class)
 * @Vich\Uploadable
 * @ApiResource(formats ={"json"})
 * @ApiFilter(SearchFilter::class, properties= {"Nom" : "ipartial", "Prenom" : "ipartial"})
 */
class Employe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $CIN;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="float")
     */
    private $Salaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Tel;

    /**
     * @ORM\Column(type="time")
     */
    private $HeureEntreeOfficielle;

    /**
     * @ORM\Column(type="time")
     */
    private $HeureSortieOfficielle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;

    /**
     * @ORM\Column(type="string", length=255)
     * * @Groups({"employe:read", "employe:write"})
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Poste;

     /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $Image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="Image")
     * @var File
     */
    private $ImageFile;

     /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $ImageDroite;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="ImageDroite")
     * @var File
     */
    private $ImageDroiteFile;

     /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $ImageGauche;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="ImageGauche")
     * @var File
     */
    private $ImageGaucheFile;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissance;

    /**
     * @ORM\OneToMany(targetEntity=Fiche::class, mappedBy="Employe")
     */
    private $fiches;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumSS;

    /**
     * @ORM\Column(type="bigint")
     */
    private $NumCompte;

    /**
     * @ORM\OneToMany(targetEntity=RapportPointage::class, mappedBy="Employe", orphanRemoval=true)
     */
    private $rapportPointages;

    

    public function __construct()
    {
        $this->fiches = new ArrayCollection();
        $this->rapportPointages = new ArrayCollection();
    }

  



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCIN(): ?string
    {
        return $this->CIN;
    }

    public function setCIN(string $CIN): self
    {
        $this->CIN = $CIN;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->Salaire;
    }

    public function setSalaire(float $Salaire): self
    {
        $this->Salaire = $Salaire;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getHeureEntreeOfficielle(): ?\DateTimeInterface
    {
        return $this->HeureEntreeOfficielle;
    }

    public function setHeureEntreeOfficielle(\DateTimeInterface $HeureEntreeOfficielle): self
    {
        $this->HeureEntreeOfficielle = $HeureEntreeOfficielle;

        return $this;
    }

    public function getHeureSortieOfficielle(): ?\DateTimeInterface
    {
        return $this->HeureSortieOfficielle;
    }

    public function setHeureSortieOfficielle(\DateTimeInterface $HeureSortieOfficielle): self
    {
        $this->HeureSortieOfficielle = $HeureSortieOfficielle;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }


    public function setImageFile( $Image = null)
    {
        $this->ImageFile = $Image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($Image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->ImageFile;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;
    }

    public function getImage()
    {
        return $this->Image;
    }

    
    public function setImageDroiteFile( $ImageDroite = null)
    {
        $this->ImageDroiteFile = $ImageDroite;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($ImageDroite) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageDroiteFile()
    {
        return $this->ImageDroiteFile;
    }

    public function setImageDroite($ImageDroite)
    {
        $this->ImageDroite = $ImageDroite;
    }

    public function getImageDroite()
    {
        return $this->ImageDroite;
    }

    public function setImageGaucheFile( $ImageGauche = null)
    {
        $this->ImageGaucheFile = $ImageGauche;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($ImageGauche) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageGaucheFile()
    {
        return $this->ImageGaucheFile;
    }

    public function setImageGauche($ImageGauche)
    {
        $this->ImageGauche = $ImageGauche;
    }

    public function getImageGauche()
    {
        return $this->ImageGauche;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->DateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $DateNaissance): self
    {
        $this->DateNaissance = $DateNaissance;

        return $this;
    }

    

    public function getFullName()
    {
        return $this->getNom().' '.$this->getPrenom();
    }

    public function __toString()
    {
        return $this->getFullName();
    }

    /**
     * @return Collection|Fiche[]
     */
    public function getFiches(): Collection
    {
        return $this->fiches;
    }

    public function addFich(Fiche $fich): self
    {
        if (!$this->fiches->contains($fich)) {
            $this->fiches[] = $fich;
            $fich->setEmploye($this);
        }

        return $this;
    }

    public function removeFich(Fiche $fich): self
    {
        if ($this->fiches->removeElement($fich)) {
            // set the owning side to null (unless already changed)
            if ($fich->getEmploye() === $this) {
                $fich->setEmploye(null);
            }
        }

        return $this;
    }

    public function getNumSS(): ?int
    {
        return $this->NumSS;
    }

    public function setNumSS(int $NumSS): self
    {
        $this->NumSS = $NumSS;

        return $this;
    }

    public function getNumCompte(): ?string
    {
        return $this->NumCompte;
    }

    public function setNumCompte(string $NumCompte): self
    {
        $this->NumCompte = $NumCompte;

        return $this;
    }

    /**
     * @return Collection|RapportPointage[]
     */
    public function getRapportPointages(): Collection
    {
        return $this->rapportPointages;
    }

    public function addRapportPointage(RapportPointage $rapportPointage): self
    {
        if (!$this->rapportPointages->contains($rapportPointage)) {
            $this->rapportPointages[] = $rapportPointage;
            $rapportPointage->setEmploye($this);
        }

        return $this;
    }

    public function removeRapportPointage(RapportPointage $rapportPointage): self
    {
        if ($this->rapportPointages->removeElement($rapportPointage)) {
            // set the owning side to null (unless already changed)
            if ($rapportPointage->getEmploye() === $this) {
                $rapportPointage->setEmploye(null);
            }
        }

        return $this;
    }

    
}
