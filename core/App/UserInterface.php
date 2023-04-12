<?php

namespace App;

interface UserInterface
{
    public function getId();
    public function getPassword();
    public function setPassword(string $password);
    public function getUsername ();
    public function setUsername(string $username);
}