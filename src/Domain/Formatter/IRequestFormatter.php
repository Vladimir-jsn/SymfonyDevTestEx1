<?php

namespace App\Domain\Formatter;

use Symfony\Component\Validator\ConstraintViolationListInterface;

interface IRequestFormatter
{
    public function format(ConstraintViolationListInterface $errors): string;
}