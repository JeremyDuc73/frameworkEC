<?php

namespace Entity;

use App\Security;
use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\UserRepository;

#[Table(name: "utilisateurs")]
#[TargetRepository(repositoryName: UserRepository::class)]
class User extends \App\Security
{
    protected int $id;
    protected string $username;
    protected string $password;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $this->encryptPassword($password);
    }
}