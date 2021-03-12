<?php

namespace App\Domain\UserAccount\Event;

use App\Domain\UserAccount\Entity\User;
use App\Domain\UserAccount\Request\ChangePasswordRequest;
use Symfony\Contracts\EventDispatcher\Event;

class ChangePasswordEvent extends Event
{
    public const NAME = 'user_account.change_password';

    protected User $user;
    protected ChangePasswordRequest $passwordRequest;

    public function __construct(User $user, ChangePasswordRequest $passwordRequest)
    {
        $this->user = $user;
        $this->passwordRequest = $passwordRequest;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getPasswordRequest(): ChangePasswordRequest
    {
        return $this->passwordRequest;
    }
}