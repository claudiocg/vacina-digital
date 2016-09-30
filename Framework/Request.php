<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request
{
    public function __construct()
    {
        $this->request = SymfonyRequest::createFromGlobals();
    }
	public function uri()
	{
		return trim(
            parse_url($this->request->server->get('REQUEST_URI'), PHP_URL_PATH), 
        '/');
	}
	public function method()
	{
        if ($this->request->get('_method'))
            return $this->request->get('_method');

        return $this->request->getMethod();
	}
}