<?php

namespace App\Domain\UserAccount\Entity;

use App\Domain\BaseEntity;

/**
 * Class UserAccount
 * @package App\Domain\UserAccount\Entity
 */
class UserAccount extends BaseEntity
{
    protected int $id;
    protected int $userId;
    protected array $settings;
    protected string $language;

    public function __construct()
    {
        $this->id = 1;
        $this->userId = 1;
        $this->settings = [];
        $this->language = 'en';
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

    public function setUserId(int $newValue): self
    {
        $this->userId = $newValue;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setSettings(array $newValue): self
    {
        $this->settings = $newValue;
        return $this;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function setLanguage(string $newValue): self
    {
        $this->language = $newValue;
        return $this;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

}