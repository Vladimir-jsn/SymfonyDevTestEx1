<?php

namespace App\Domain\UserAccount\Validator;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\ConstraintViolationListInterface;

interface IRequestValidator
{
    public function getConstraints(): Collection;
    public function validate($input): ConstraintViolationListInterface;
}