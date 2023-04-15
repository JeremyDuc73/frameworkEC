<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\CategorieProduit;

#[TargetEntity(entityName: CategorieProduit::class)]
class CategoriesProduitsRepository extends AbstractRepository
{
    public function insert(CategorieProduit $catProduits){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET titre=:titre");

        $query->execute([
            "titre"=>$catProduits->getTitre()
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update(CategorieProduit $catProduits){
        $query = $this->pdo->prepare("UPDATE {$this->tableName} SET titre= :titre WHERE id = :id");
        $query->execute([
            'id'=>$catProduits->getId(),
            'titre'=>$catProduits->getTitre()
        ]);
    }
}