<?php

namespace App\Domain;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class BaseRequest
{
    protected Request $request;

    /**
     * ChangePasswordRequest constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        /** @noinspection PhpFieldAssignmentTypeMismatchInspection */
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return \Symfony\Component\HttpFoundation\InputBag|\Symfony\Component\HttpFoundation\ParameterBagInputBag|ParameterBag
     */
    public function getPostBody()
    {
        return $this->request->request;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
}