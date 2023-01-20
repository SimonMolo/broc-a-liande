<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ArticlesRepository::class)]
class Articles
{


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $time = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $desciption = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $Qualite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $defauts = null;

    #[ORM\Column(length: 255)]
    private ?string $articleFilename = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(?string $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDesciption(): ?string
    {
        return $this->desciption;
    }

    public function setDesciption(string $desciption): self
    {
        $this->desciption = $desciption;

        return $this;
    }

    public function getQualite(): ?string
    {
        return $this->Qualite;
    }

    public function setQualite(?string $Qualite): self
    {
        $this->Qualite = $Qualite;

        return $this;
    }

    public function getDefauts(): ?string
    {
        return $this->defauts;
    }

    public function setDefauts(?string $defauts): self
    {
        $this->defauts = $defauts;

        return $this;
    }

    public function getArticleFilename(): ?string
    {
        return $this->articleFilename;
    }

    public function setArticleFilename(string $articleFilename): self
    {
        $this->articleFilename = $articleFilename;

        return $this;
    }
}
