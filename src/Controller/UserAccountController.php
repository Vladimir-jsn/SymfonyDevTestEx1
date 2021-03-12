<?php

namespace App\Controller;

use App\Domain\BaseController;
use App\Domain\UserAccount\Event\ChangePasswordEvent;
use App\Domain\UserAccount\Request\ChangePasswordRequest;
use App\Domain\UserAccount\Service\UserAccountService;
use App\Domain\UserAccount\Validator\ChangePasswordRequestValidator;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Exception\InvalidArgumentException;

class UserAccountController extends BaseController
{

    /**
     * @Route("/account/change-password/{accountId}", methods={"POST"})
     *
     * @param int $accountId
     * @param ChangePasswordRequest $changePasswordRequest
     * @param ChangePasswordRequestValidator $validator
     * @param UserAccountService $accountService
     * @return Response
     */
    public function changePassword(
        int $accountId,
        ChangePasswordRequest $changePasswordRequest,
        ChangePasswordRequestValidator $validator,
        UserAccountService $accountService
    ): Response
    {
        if ($errors = $this->validateRequest($changePasswordRequest, $validator)) {
            return $this->failResponse($errors);
        }

        $dispatcher = new EventDispatcher();
        $dispatcher->addListener(ChangePasswordEvent::NAME, function () {
            throw new InvalidArgumentException('password_CHANGED!!!');
        });

        try {
            $accountService->changeUserPassword($accountId, $changePasswordRequest);
        } catch (InvalidArgumentException $exception) {
            return $this->failResponse($exception->getMessage());
        }

        return new Response('password_changed', Response::HTTP_ACCEPTED);
    }
}