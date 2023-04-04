<?php

namespace Controllers;


use Attributes\DefaultEntity;
use Attributes\TargetEntity;
use Attributes\TargetRepository;
use Attributes\UsesEntity;

class AbstractController
{

    protected $usesEntity = true;


    protected $repository;

    public function __construct()
    {


            $this->usesEntity =$this->resolveUsesEntity();


        if($this->usesEntity){
            $this->repository = $this->getRepository($this->resolveDefaultEntityName());

        }
    }

    protected function resolveUsesEntity(){
        $reflect = new \ReflectionClass($this);  //$attributes

        $attributes = $reflect->getAttributes(UsesEntity::class);

        if(!empty($attributes)){
            return $attributes[0]->getArguments()["value"];

        }else{
            return true;
        }
    }

    protected function resolveDefaultEntityName(){
        $reflect = new \ReflectionClass($this);  //$attributes

        $attributes = $reflect->getAttributes(DefaultEntity::class);

        return $attributes[0]->getArguments()["entityName"];
    }

    protected function getRepository($entityName){

        $reflect = new \ReflectionClass($entityName);  //$attributes

        $attributes = $reflect->getAttributes(TargetRepository::class);

        $repoName = $attributes[0]->getArguments()["repositoryName"];

        return new $repoName();

    }


    public function render($template, $data){
        return \App\View::render($template, $data);
    }
    public function redirect(? array $params=null){
        return \App\Response::redirect($params);
    }
}