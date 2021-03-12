<?php

namespace App\Domain\UserAccount\Service;

use App\Domain\UserAccount\Entity\User;
use App\Domain\UserAccount\Event\ChangePasswordEvent;
use App\Domain\UserAccount\Repository\UserAccountRepository;
use App\Domain\UserAccount\Repository\UserRepository;
use App\Domain\UserAccount\Request\ChangePasswordRequest;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Validator\Exception\InvalidArgumentException;

class UserAccountService
{
    public function getCurrentUser(): User
    {
        return new User();
    }

    public function changeUserPassword(int $accountId, ChangePasswordRequest $changePasswordRequest)
    {
        $userAccount = UserAccountRepository::getAccountById($accountId);
        $user = $this->getCurrentUser();

        if ($userAccount->getUserId() !== $user->getId()) {
            throw new InvalidArgumentException('The user is not the owner of the account');
        }

        if ($user->getPassword() === $changePasswordRequest->oldPassword) {
            throw new InvalidArgumentException('Invalid user password');
        }

        $user->setPassword($changePasswordRequest->newPassword);
        UserRepository::update($user);

        $dispatcher = new EventDispatcher();
        $event = new ChangePasswordEvent($user, $changePasswordRequest);

        $dispatcher->dispatch($event, 'user_account.change_password');
    }

}