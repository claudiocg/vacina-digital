<?php

namespace Framework;

class Request
{
	public static function uri()
	{
		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
	}
	public static function method()
	{
		return isset($_REQUEST['_method']) ? $_REQUEST['_method'] : $_SERVER['REQUEST_METHOD'];
	}
}