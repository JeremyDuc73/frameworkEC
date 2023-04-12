<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Membre;

#[TargetEntity(entityName: Membre::class)]
class MembresRepository extends AbstractRepository
{
    public function insert(Membre $membre){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET photo = :photo, identite = :identite, parcours=:parcours ");

        $query->execute([
            "photo"=>$membre->getPhoto(),
            "identite"=>$membre->getIdentite(),
            "parcours"=>$membre->getParcours()
        ]);
        return $this->pdo->lastInsertId();

    }

    public function update(Membre $membre){
        $query = $this->pdo->prepare("UPDATE {$this->tableName} SET photo = :photo, identite= :identite, parcours= :parcours WHERE id = :id");
        $query->execute([
            'id'=>$membre->getId(),
            'photo'=>$membre->getPhoto(),
            'identite'=>$membre->getIdentite(),
            'parcours'=>$membre->getParcours()
        ]);
    }

}