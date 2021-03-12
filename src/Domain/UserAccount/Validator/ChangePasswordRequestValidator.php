<?php

namespace App\Domain\UserAccount\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints;

class ChangePasswordRequestValidator implements IRequestValidator
{
    const MIN_PASSWORD_LENGTH = 6;
    const MAX_PASSWORD_LENGTH = 25;

    const ERROR_MSG_MIN_PASSWORD = 'invalid_min_pass_msg';
    const ERROR_MSG_MAX_PASSWORD = 'invalid_max_pass_msg';

    public ValidatorInterface $validator;

    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    protected function getPasswordConstraints(): Constraint
    {
        return new Constraints\Optional([
            new Constraints\NotBlank(),
            new Constraints\Length([
                'min' => self::MIN_PASSWORD_LENGTH,
                'max' => self::MAX_PASSWORD_LENGTH,
                'minMessage' => self::ERROR_MSG_MIN_PASSWORD,
                'maxMessage' => self::ERROR_MSG_MAX_PASSWORD,
            ]),
            new Constraints\Type('string'),
        ]);
    }

    public function getConstraints(): Constraints\Collection
    {
        return new Constraints\Collection([
            'old_password' => $this->getPasswordConstraints(),
            'new_password' => $this->getPasswordConstraints(),
        ]);
    }

    public function validate($input): ConstraintViolationListInterface
    {
        return $this->validator->validate($input, $this->getConstraints());
    }
}