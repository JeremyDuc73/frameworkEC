<?php

namespace Controllers;

use App\File;
use App\Session;
use Attributes\DefaultEntity;
use Entity\Membre;
use Entity\User;
use App\Request;

#[DefaultEntity(entityName: User::class)]
class AdminController extends AbstractController
{
    public function register(){

        $request = $this->post("form",["username"=>"string","password"=>"string"]);

        if($request["username"] && $request["password"]){

            $user = new User();
            $user->setUsername($request["username"]);
            $user->setPassword($request["password"]);

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

        if($request["username"] && $request["password"]){

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

        if($request["identite"] && $request["parcours"]){

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

        if(!$request["id"]){ return $this->redirect(); }

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

        if($request["id"] && $request["identite"] && $request["parcours"]){



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
}