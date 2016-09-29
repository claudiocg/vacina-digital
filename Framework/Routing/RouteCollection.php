<?php

namespace Framework\Routing;

class RouteCollection
{
	/**
     * An array with all routes, separeted by method
     * @var array
     */
	public $routes = [
		'GET' => [],
		'POST' => [],
		'PATCH' => [],
		'DELETE' => []
	];
	/**
	 * Add a route to RouteCollection
	 * @param Route $route [description]
	 */
	public function add(Route $route)
	{
		$this->routes[$route->getMethod()][$route->getUri()] = $route;
	}
}
