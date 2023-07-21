<?php

namespace App\Entity;

use App\Repository\PostulerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PostulerRepository::class)]
#[Vich\Uploadable]

class Postuler
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length:255, nullable:true)]

   private ?string $resume;

   #[Vich\UploadableField(mapping:'postuler_resume', fileNameProperty:'resume')]

  private $resumeFile;



    #[ORM\Column(length: 255)]
    private ?string $email = null;

    // #[ORM\Column(length: 255)]
    // private ?string $file = null;

    #[ORM\Column(length: 255)]
    private ?string $votreDemande = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;



    #[ORM\ManyToOne(inversedBy: 'postuler')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'postulers')]
    private ?Offre $offre = null;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }



    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    // public function getFile(): ?string
    // {
    //     return $this->file;
    // }

    // public function setFile(string $file): self
    // {
    //     $this->file = $file;

    //     return $this;
    // }

    public function getVotreDemande(): ?string
    {
        return $this->votreDemande;
    }

    public function setVotreDemande(string $votreDemande): self
    {
        $this->votreDemande = $votreDemande;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    public function setResumeFile(?File $resumeFile): void
    {
        $this->resumeFile = $resumeFile;
        if ($resumeFile) {
            // It's important to update the resume property as well
            // when the upload field is set directly.
            $this->resume = $resumeFile->getFilename();
        }
    }

    public function getResumeFile(): ?File
    {
        return $this->resumeFile;
    }

    public function setResume(?string $resume): void
    {
        $this->resume = $resume;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }


}
