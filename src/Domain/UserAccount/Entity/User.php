<?php

namespace App\Domain\UserAccount\Entity;

use App\Domain\BaseEntity;

/**
 * Class User
 * @package App\Domain\UserAccount\Entity
 */
class User extends BaseEntity
{
    protected int $id;
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected string $password;

    public function __construct()
    {
        $this->id = 1;
        $this->firstName = '';
        $this->lastName = '';
        $this->email = '';
        $this->password = 'test_password';
    }

    public function setId(int $newValue): self
    {
        $this->id = $newValue;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstName(string $newValue): self
    {
        $this->firstName = $newValue;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $newValue): self
    {
        $this->lastName = $newValue;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setEmail(string $newValue): self
    {
        $this->email = $newValue;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $newValue): self
    {
        $this->password = $newValue;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}