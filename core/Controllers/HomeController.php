<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Attributes\UsesEntity;
use Entity\AbstractEntity;


#[UsesEntity(value: false)]
class HomeController extends AbstractController
{




    public function index()
    {

        return $this->render("home/index", ["pageTitle"=>"home"]);
    }

}