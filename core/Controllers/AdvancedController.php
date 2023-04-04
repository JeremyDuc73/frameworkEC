<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Attributes\UsesEntity;
use Entity\Membre;
use Entity\Partenaire;

#[DefaultEntity(entityName: Partenaire::class)]
class AdvancedController extends AbstractController
{
    public function accueil()
    {
        $membres = $this->getRepository(entityName: Membre::class)->findAll();
        return $this->render("accueil/index", [
            "pageTitle"=>"Emotion Coiffure",
            "membres"=>$membres
        ]);
    }



    public function partenaires(){
        $partenaires = $this->repository->findAll();

        return $this->render("partenaires/index", [
            "pageTitle"=>"Nos partenaires",
            "partenaires"=>$partenaires
        ]);
    }

}