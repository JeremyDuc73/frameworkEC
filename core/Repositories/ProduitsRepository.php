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

    public function insert(Produit $produit){
        $request = $this->pdo->prepare("INSERT INTO {$this->tableName} SET cat_id = :catId, titre = :titre, description = :description, image = :image");


        $request->execute([
            "catId"=> $produit->getCatId(),
            "titre"=>$produit->getTitre(),
            "description"=>$produit->getDescription(),
            "image"=>$produit->getImage()
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update(Produit $produit){
        $query = $this->pdo->prepare("UPDATE {$this->tableName} SET image = :image, titre= :titre, description= :description WHERE id = :id");
        $query->execute([
            'id'=>$produit->getId(),
            'image'=>$produit->getImage(),
            'titre'=>$produit->getTitre(),
            'description'=>$produit->getDescription()
        ]);
    }
}