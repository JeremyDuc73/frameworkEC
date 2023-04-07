<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Attributes\UsesEntity;
use Entity\CategorieProduit;
use Entity\Membre;
use Entity\Partenaire;
use Entity\Produit;

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

    public function categoriesProduits(){
        $categoriesProduits = $this->getRepository(entityName: CategorieProduit::class)->findAll();
        $id = $this->getRepository(entityName: CategorieProduit::class)->getId();
        $cat = $this->getRepository(entityName: CategorieProduit::class)->findById($id);
        $produits = $this->getRepository(entityName: Produit::class)->findAllByCategorieProduit($cat);
        return $this->render("produits/index", [
           "pageTitle"=>"Nos produits",
           "categories"=>$categoriesProduits,
            "produits"=>$produits
        ]);
    }

}