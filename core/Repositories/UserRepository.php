<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\User;

#[TargetEntity(entityName: User::class)]
class UserRepository extends AbstractRepository
{
    public function insert(User $user){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET username = :username, password = :password");

        $query->execute([
            "username"=>$user->getUsername(),
            "password"=>$user->getPassword()
        ]);
        return $this->pdo->lastInsertId();

    }

    public function findByUsername(string $username){
        $query= $this->pdo->prepare("SELECT * FROM $this->tableName WHERE username =:username");

        $query->execute(["username"=>$username]);

        $query->setFetchMode(\PDO::FETCH_CLASS,get_class($this->targetEntity));

        $item = $query->fetch();
        return $item;
    }
}