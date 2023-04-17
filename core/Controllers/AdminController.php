<?php

namespace Controllers;

use App\File;
use App\Session;
use Attributes\DefaultEntity;
use Entity\CategorieProduit;
use Entity\Membre;
use Entity\Partenaire;
use Entity\Produit;
use Entity\User;
use App\Request;

#[DefaultEntity(entityName: User::class)]
class AdminController extends AbstractController
{
    public function register(){

        $username = null;
        $password = null;

        if(!empty($_POST['username'])){
            $username = htmlspecialchars($_POST['username']);

        }
        if(!empty($_POST['password'])){
            $password = htmlspecialchars($_POST['password']);

        }

        if($username && $password){

            $user = new User();
            $user->setUsername($username);
            $user->setPassword($password);

            $this->repository->insert($user);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"accueil"
            ]);
        }

        return $this->render("utilisateurs/inscription", [
            "pageTitle"=>"Nouveau compte"
        ]);
    }

    public function signIn(){

        $request = $this->post("form",["username"=>"text","password"=>"text"]);

        if($request){

            // user exists ?
            $user = $this->repository->findByUsername($request["username"]);

            if(!$user){
                return $this->redirect([
                    "type"=>"admin",
                    "action"=>"signIn",
                    "info"=>"username inconnu"
                ]);
            }

            if($user->passwordMatches($request["password"])){
                $user->logIn();
                return $this->redirect([
                    "type"=>"advanced",
                    "action"=>"accueil"
                ]);
            }
            return $this->redirect([
                "type"=>"admin",
                "action"=>"signIn",
                "info"=> "mauvais mot de passe"
            ]);
        }
        return $this->render("utilisateurs/connexion", [
            "pageTitle"=>"Se connecter"
        ]);
    }

    public function signOut()
    {

        $user = $this->getUser();
        if($user){
            $user->logOut();
        }
        return $this->redirect();

    }

    public function createMembre(){

        if(!$this->getUser()){
            return $this->redirect([
                "info"=>"connecte toi d'abord"
            ]);
        }

        $request = $this->post("form",["identite"=>"text","parcours"=>"text"]);

        if($request){

            $photo = new File("photo");

            if($photo->isImage()){
                $photo->upload();
            }

            $membre = new Membre();
            $membre->setIdentite($request["identite"]);
            $membre->setParcours($request["parcours"]);
            $membre->setPhoto($photo->getName());

            $this->getRepository(entityName: Membre::class)->insert($membre);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"accueil"
            ]);
        }

        return $this->render("accueil/nouveauMembre", [
            "pageTitle"=>"Nouveau membre"
        ]);
    }

    public function removeMembre(){

        $request = $this->get("form",["id"=>"number"]);

        if(!$request){ return $this->redirect(); }

        $membre = $this->getRepository(entityName: Membre::class)->findById($request["id"]);

        if(!$membre){ return $this->redirect(); }
        $photo = new File("photo");
        $photo->deleteFile($membre->getPhoto());
        $this->getRepository(entityName: Membre::class)->delete($membre);

        return $this->redirect();

    }

    public function changeMembre(){

        $requestId = $this->get("form",["id"=>"number"]);

        if($requestId["id"]){
            $membre = $this->getRepository(entityName: Membre::class)->findById($requestId["id"]);
            if(!$membre){
                return $this->redirect();
            }
        }

        $request = $this->post("form",[
            "id"=>"number",
            "identite"=>"text",
            "parcours"=>"text"
        ]);

        if($request){
            $membre = $this->getRepository(entityName: Membre::class)->findById($request["id"]);
            $membre->setIdentite($request["identite"]);
            $membre->setParcours($request["parcours"]);
            $photo = new File("photo");

            if($photo->isImage()){
                $photo->deleteFile($membre->getPhoto());
                $photo->upload();
                $membre->setPhoto($photo->getName());
            }

            $this->getRepository(entityName: Membre::class)->update($membre);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"accueil"
            ]);
        }
        return $this->render("accueil/modifierMembre", [
            "membre"=>$membre,
            "pageTitle"=>"modifier le membre"]);
    }



    public function createPartenaire(){
        if(!$this->getUser()){
            return $this->redirect([
                "info"=>"connecte toi d'abord"
            ]);
        }

        $request = $this->post("form",["nom"=>"text","description"=>"text","lien"=>"text"]);

        if($request){
            $logo = new File("logo");
            if($logo->isImage()){
                $logo->upload();
            }
            $partenaire = new Partenaire();
            $partenaire->setNom($request["nom"]);
            $partenaire->setDescription($request["description"]);
            $partenaire->setLien($request["lien"]);
            $partenaire->setLogo($logo->getName());

            $this->getRepository(entityName: Partenaire::class)->insert($partenaire);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"partenaires"
            ]);
        }

        return $this->render("partenaires/nouveauPartenaire", [
            "pageTitle"=>"Nouveau partenaire"
        ]);
    }

    public function removePartenaire(){

        $request = $this->get("form",["id"=>"number"]);

        if(!$request){ return $this->redirect([
            "type"=>"advanced",
            "action"=>"partenaires"
        ]); }

        $partenaire = $this->getRepository(entityName: Partenaire::class)->findById($request["id"]);

        if(!$partenaire){ return $this->redirect([
            "type"=>"advanced",
            "action"=>"partenaires"
        ]); }
        $logo = new File("logo");
        $logo->deleteFile($partenaire->getLogo());
        $this->getRepository(entityName: Partenaire::class)->delete($partenaire);

        return $this->redirect([
            "type"=>"advanced",
            "action"=>"partenaires"
        ]);

    }

    public function changePartenaire(){

        $requestId = $this->get("form",["id"=>"number"]);

        if($requestId){
            $partenaire = $this->getRepository(entityName: Partenaire::class)->findById($requestId["id"]);
            if(!$partenaire){
                return $this->redirect([
                    "type"=>"advanced",
                    "action"=>"partenaires"
                ]);
            }
        }

        $request = $this->post("form",[
            "id"=>"number",
            "nom"=>"text",
            "description"=>"text",
            "lien"=>"text"
        ]);

        if($request){
            $partenaire = $this->getRepository(entityName: Partenaire::class)->findById($request["id"]);
            $partenaire->setNom($request["nom"]);
            $partenaire->setDescription($request["description"]);
            $partenaire->setLien($request["lien"]);
            $logo = new File("logo");

            if($logo->isImage()){
                $logo->deleteFile($partenaire->getLogo());
                $logo->upload();
                $partenaire->setLogo($logo->getName());
            }

            $this->getRepository(entityName: Partenaire::class)->update($partenaire);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"partenaires"
            ]);

        }
        return $this->render("partenaires/modifierPartenaire", [
            "partenaire"=>$partenaire,
            "pageTitle"=>"Modifier le partenaire"]);
    }



    public function createCategorieProduits(){
        if(!$this->getUser()){
            return $this->redirect([
                "info"=>"connecte toi d'abord"
            ]);
        }
        $request = $this->post("form",["titre"=>"text"]);
        if($request){
            $catProduits = new CategorieProduit();
            $catProduits->setTitre($request["titre"]);

            $this->getRepository(entityName: CategorieProduit::class)->insert($catProduits);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"categoriesProduits"
            ]);
        }

        return $this->render("produits/nouveauCategorieProduits", [
            "pageTitle"=>"Nouvelle catégorie de produits"
        ]);
    }

    public function removeCategorieProduits(){

        $request = $this->get("form",["id"=>"number"]);

        if(!$request){ return $this->redirect([
            "type"=>"advanced",
            "action"=>"categoriesProduits"
        ]); }

        $catProduits = $this->getRepository(entityName: CategorieProduit::class)->findById($request["id"]);

        if(!$catProduits){ return $this->redirect([
            "type"=>"advanced",
            "action"=>"categoriesProduits"
        ]); }
        $this->getRepository(entityName: CategorieProduit::class)->delete($catProduits);

        return $this->redirect([
            "type"=>"advanced",
            "action"=>"categoriesProduits"
        ]);

    }

    public function changeCategorieProduits(){

        $requestId = $this->get("form",["id"=>"number"]);

        if($requestId){
            $catProduits = $this->getRepository(entityName: CategorieProduit::class)->findById($requestId["id"]);
            if(!$catProduits){
                return $this->redirect([
                    "type"=>"advanced",
                    "action"=>"categoriesProduits"
                ]);
            }
        }

        $request = $this->post("form",[
            "id"=>"number",
            "titre"=>"text"
        ]);

        if($request){
            $catProduits = $this->getRepository(entityName: CategorieProduit::class)->findById($request["id"]);
            $catProduits->setTitre($request["titre"]);

            $this->getRepository(entityName: CategorieProduit::class)->update($catProduits);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"categoriesProduits"
            ]);

        }
        return $this->render("produits/modifierCategorieProduits", [
            "catProduits"=>$catProduits,
            "pageTitle"=>"Modifier la catégorie"]);
    }



    public function createProduit(){
        if(!$this->getUser()){
            return $this->redirect([
                "info"=>"connecte toi d'abord"
            ]);
        }

        $requestId = $this->get("form",["catId"=>"number"]);

        if($requestId){
            $catProduits = $this->getRepository(entityName: CategorieProduit::class)->findById($requestId["catId"]);
            if(!$catProduits){
                return $this->redirect();
            }
        }


        $request = $this->post("form",["catId"=>"number","titre"=>"text","description"=>"text"]);

        if($request){
            $image = new File("image");
            if($image->isImage()){
                $image->upload();
            }
            $produit = new Produit();
            $produit->setCatId($request["catId"]);
            $produit->setTitre($request["titre"]);
            $produit->setDescription($request["description"]);
            $produit->setImage($image->getName());

            $this->getRepository(Produit::class)->insert($produit);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"categoriesProduits"
            ]);



        }
        return $this->render("produits/nouveauProduit", [
            "pageTitle"=>"Nouveau produit",
            "catProduits"=>$catProduits
        ]);

    }

    public function removeProduit(){

        $request = $this->get("form",["id"=>"number"]);

        if(!$request){ return $this->redirect([
            "type"=>"advanced",
            "action"=>"categoriesProduits"
        ]); }

        $produit = $this->getRepository(entityName: Produit::class)->findById($request["id"]);

        if(!$produit){ return $this->redirect([
            "type"=>"advanced",
            "action"=>"categoriesProduits"
        ]); }
        $image = new File("image");
        $image->deleteFile($produit->getImage());
        $this->getRepository(entityName: Produit::class)->delete($produit);

        return $this->redirect([
            "type"=>"advanced",
            "action"=>"categoriesProduits"
        ]);

    }

    public function changeProduit(){

        $requestId = $this->get("form",["id"=>"number"]);

        if($requestId["id"]){
            $produit = $this->getRepository(entityName: Produit::class)->findById($requestId["id"]);
            if(!$produit){
                return $this->redirect();
            }
        }

        $request = $this->post("form",[
            "id"=>"number",
            "titre"=>"text",
            "description"=>"text"
        ]);

        if($request){
            $produit = $this->getRepository(entityName: Produit::class)->findById($request["id"]);
            $produit->setTitre($request["titre"]);
            $produit->setDescription($request["description"]);
            $image = new File("image");

            if($image->isImage()){
                $image->deleteFile($produit->getImage());
                $image->upload();
                $produit->setImage($image->getName());
            }

            $this->getRepository(entityName: Produit::class)->update($produit);

            return $this->redirect([
                "type"=>"advanced",
                "action"=>"categoriesProduits"
            ]);
        }
        return $this->render("produits/modifierProduit", [
            "produit"=>$produit,
            "pageTitle"=>"modifier le produit"]);
    }

}