<?php

namespace App\Domain\UserAccount\Request;

use App\Domain\BaseRequest;
use Symfony\Component\HttpFoundation\RequestStack;

class ChangePasswordRequest extends BaseRequest
{
    public string $oldPassword;
    public string $newPassword;

    public function __construct(RequestStack $requestStack)
    {
        parent::__construct($requestStack);

        $this->oldPassword = (string) $this->getPostBody()->get('old_password');
        $this->newPassword = (string) $this->getPostBody()->get('new_password');
    }
}