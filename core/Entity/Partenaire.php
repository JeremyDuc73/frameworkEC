<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\PartenaireRepository;

#[Table(name: "partenaires")]
#[TargetRepository(repositoryName: PartenaireRepository::class)]
class Partenaire extends AbstractEntity
{
    private int $id;
    private string $logo;
    private string $nom;
    private string $description;
    private string $lien;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo(string $logo): void
    {
        $this->logo = $logo;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
    }

    /**
     * @param string $lien
     */
    public function setLien(string $lien): void
    {
        $this->lien = $lien;
    }
}