<?php

namespace App\Entity;

use App\Repository\DemoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: DemoRepository::class)]
class Demo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank]
    private ?int $age = null;

    /**
      * @Assert\NotBlank(message="Please, upload the photo.")
      * @Assert\File(mimeTypes={ "image/png", "image/jpeg" })
   */

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Please, upload the photo.")]
    #[Assert\File(mimeTypes: ["image/png", "image/jpeg"])]
    private $photo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
