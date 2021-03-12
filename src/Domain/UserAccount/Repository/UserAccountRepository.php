<?php

namespace App\Domain\UserAccount\Repository;

use App\Domain\BaseRepository;
use App\Domain\UserAccount\Entity\UserAccount;

class UserAccountRepository extends BaseRepository
{
    public static function getAccountById(int $id): UserAccount
    {
        return new UserAccount();
    }
}