<?php

namespace App;

abstract class Security implements UserInterface
{
    protected int $id ;

    protected string $username;
    protected string $password;

    public function encryptPassword($clearPassword){

        return password_hash($clearPassword, PASSWORD_DEFAULT);

    }

    public function passwordMatches(string $clearPassword):bool
    {

        return password_verify($clearPassword, $this->password);

    }

    public function logIn(){

        \App\Session::add('user', [
            'id'=>$this->id,
            'username'=>$this->username
        ]);
    }

    public function logOut(){
        \App\Session::remove('user');
    }

}