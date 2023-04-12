<?php

namespace App;

use Repositories\UserRepository;
class Session
{
    public static function start(){
        session_start();
    }

    public static function get($index){

        $result = false;

        if(isset($_SESSION[$index])){

            $result = $_SESSION[$index];
        }

        return $result;
    }
    public static function add($key, $value){

        $_SESSION[$key] = $value;

    }
    public static function remove($key){

        $_SESSION[$key] = null;

    }
    public static function destroy(){
        session_destroy();
    }

    public static function getUser(){
        $user = \App\Session::get('user');
        if(isset($user['id'])){

            $userRepo = new UserRepository();
            return $userRepo->findById($user['id']);

        }else return false;
    }
}