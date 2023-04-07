<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\CategorieProduit;
use Entity\Produit;

#[TargetEntity(entityName: Produit::class)]
class ProduitsRepository extends AbstractRepository
{
    public function findAllByCategorieProduit(CategorieProduit $cat){
        $query = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE cat_id = :cat_id");
        $query->execute([
            "cat_id"=>$cat->getId()
        ]);
        $produits = $query->fetchAll(\PDO::FETCH_CLASS, get_class($this->targetEntity));
        return $produits;
    }
}