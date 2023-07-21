<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\TalentRepository;
use DateTimeImmutable;
use Serializable;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TalentRepository::class)]
#[Vich\Uploadable]
class Talent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $metier = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;


    #[Vich\UploadableField(mapping:'talent_image', fileNameProperty:'imageName')]
    private ?File $imageFile = null;



    #[ORM\Column(length: 255)]
    private ?string $imageName = null;

    #[ORM\Column(type:"datetime_immutable", nullable:true)]
    private $updatedAt;

    #[ORM\Column]
    private ?int $user_id = null;



    public function getId(): ?int
    {
        return $this->id;
    }
    public function serialize(){
      $this->imageFile =  base64_encode($this->imageFile);
    }
    public function unserialize($data)
    {
      $this->imageFile = base64_decode($data);
    }


    public function getMetier(): ?string
    {
        return $this->metier;
    }

    public function setMetier(string $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImageFile(): ?File
    {

        return $this->imageFile;

    }


    public function setImageFile(?File $imageFile ): void
    {
        $this->imageFile = $imageFile;
        if (null !== $imageFile) {
          $this->updatedAt = new DateTimeImmutable();

        }

        // return $this;
    }



    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
