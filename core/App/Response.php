<?php

namespace App;

class Response
{

    public static function redirect(? array $params = null){

        $url = "index.php";

        if($params){

            //[ "type"=>"posts", "action"=>"show", "id"=>23]

            $url = "?";

            foreach ($params as $paramName=>$paramValue){

                // type=posts&
                $newParam = $paramName."=".$paramValue."&";
                $url.=$newParam;

            }

        }

        header("Location: ${url}");
        exit();

    }

    /**
     * renvoie du contenu serialisé en JSON en tant que réponse
     * @param $trucARenvoyerAuClient
     * @return void
     */
    public static function json($trucARenvoyerAuClient,?string $methodeSpe = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        if($methodeSpe == "delete"){
            header('Access-Control-Allow-Methods: DELETE');
        }
        if($methodeSpe == "put"){
            header('Access-Control-Allow-Methods: PUT');
        }

        echo json_encode($trucARenvoyerAuClient);
    }
}