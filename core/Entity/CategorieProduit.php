<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\CategoriesProduitsRepository;

#[Table(name: "categorie_produits")]
#[TargetRepository(repositoryName: CategoriesProduitsRepository::class)]
class CategorieProduit extends AbstractEntity
{
    private int $id;
    private string $titre;

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
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }
    public function getProduits(){
        $produitsRepo = new CategoriesProduitsRepository();
        return $produitsRepo->findById($this->id);
    }
}