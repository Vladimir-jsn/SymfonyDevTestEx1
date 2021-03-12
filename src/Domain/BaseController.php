<?php

namespace App\Domain;

use App\Domain\Formatter\RequestErrorFormatter;
use App\Domain\UserAccount\Validator\IRequestValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends AbstractController
{
    protected function validateRequest(BaseRequest $request, IRequestValidator $validator): string
    {
        $errors = $validator->validate(
            $request->getPostBody()->all()
        );

        $formatter = new RequestErrorFormatter();
        return $formatter->format($errors);
    }

    protected function failResponse($content, int $code = Response::HTTP_INTERNAL_SERVER_ERROR): Response
    {
        if (!is_string($content)) {
            $content = json_encode($content);
        }

        return new Response($content, $code);
    }

    protected function successResponse($content, int $code = Response::HTTP_OK): Response
    {
        if (!is_string($content)) {
            $content = json_encode($content);
        }

        return new Response($content, $code);
    }
}