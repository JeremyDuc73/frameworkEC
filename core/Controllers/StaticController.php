<?php

namespace Controllers;

use Attributes\UsesEntity;

#[UsesEntity(value: false)]
class StaticController extends AbstractController
{

    public function mentionsLegales(){
        return $this->render("mentionsLegales/index", ["pageTitle"=>"Mentions Légales"]);
    }

    public function contact(){
        return$this->render("contact/index", ["pageTitle"=>"Nous contacter"]);
    }

    public function prestations(){
        return $this->render("prestations/index", ["pageTitle"=>"Nos prestations"]);
    }
}