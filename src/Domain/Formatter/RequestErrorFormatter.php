<?php

namespace App\Domain\Formatter;

use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class RequestErrorFormatter implements IRequestFormatter
{

    public function format(ConstraintViolationListInterface $errors): string
    {
        if (!$errors->count()) {
            return '';
        }

        $errorMessages = [];

        /** @var ConstraintViolation $violation */
        foreach ($errors as $violation) {
            $errorMessages[$violation->getPropertyPath()][] = $violation->getMessage();
        }

        return json_encode($errorMessages);
    }

}