<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request
{
    public function __construct(SymfonyRequest $request)
    {
        $this->request = $request;
    }
    public function post($key)
    {
        return $this->request->request->get($key);
    }
    public function get($key)
    {
        return $this->request->query->get($key);
    }
}