<?php

namespace Controllers;

use Attributes\UsesEntity;

#[UsesEntity(value: false)]
class StaticController extends AbstractController
{

    public function mentionsLegales(){
        return $this->render("mentionsLegales/index", ["PageTitle"=>"Mentions Légales"]);
    }

    public function contact(){
        return$this->render("contact/index", ["PageTitle"=>"Nous contacter"]);
    }
}