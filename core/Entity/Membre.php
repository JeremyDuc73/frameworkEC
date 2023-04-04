<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\MembresRepository;

#[Table(name: "membres")]
#[TargetRepository(repositoryName: MembresRepository::class)]
class Membre extends AbstractEntity
{
    private int $id;
    private string $photo;
    private string $identite;
    private string $parcours;

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
    public function getPhoto(): string
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return string
     */
    public function getIdentite(): string
    {
        return $this->identite;
    }

    /**
     * @param string $identite
     */
    public function setIdentite(string $identite): void
    {
        $this->identite = $identite;
    }

    /**
     * @return string
     */
    public function getParcours(): string
    {
        return $this->parcours;
    }

    /**
     * @param string $parcours
     */
    public function setParcours(string $parcours): void
    {
        $this->parcours = $parcours;
    }
}