<?php

namespace App\Domain\UserAccount\Repository;

use App\Domain\BaseRepository;
use App\Domain\UserAccount\Entity\UserAccount;

class UserRepository extends BaseRepository
{
    public static function getAccountById(int $id): UserAccount
    {
        return new UserAccount();
    }
}