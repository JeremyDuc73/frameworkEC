<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Partenaire;

#[TargetEntity(entityName: Partenaire::class)]
class PartenaireRepository extends AbstractRepository
{
    public function insert(Partenaire $partenaire){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET nom = :nom, description = :description, lien=:lien, logo = :logo ");

        $query->execute([
            "nom"=>$partenaire->getNom(),
            "description"=>$partenaire->getDescription(),
            "lien"=>$partenaire->getLien(),
            "logo"=>$partenaire->getLogo()
        ]);
        return $this->pdo->lastInsertId();
    }

    public function update(Partenaire $partenaire){
        $query = $this->pdo->prepare("UPDATE {$this->tableName} SET nom = :nom, description= :description, lien= :lien, logo= :logo WHERE id = :id");
        $query->execute([
            'id'=>$partenaire->getId(),
            'nom'=>$partenaire->getNom(),
            'description'=>$partenaire->getDescription(),
            'lien'=>$partenaire->getLien(),
            'logo'=>$partenaire->getLogo()
        ]);
    }
}