<?php

namespace Framework\Routing;

class Route
{
	protected $method;

	protected $uri;

	protected $controller;

	protected $action;

	protected $request;

	protected $regex;

	protected $compiled;

	public function __construct(string $method, string $uri, string $controller)
	{
		$this->method = $method;
		$this->uri = $uri;
		$this->controller = $controller;

		if (container('request')->method() == $this->method) {
			$this->request = $this->matches(
				$this, container('request')->method()
			);
		}
	}
	/**
	 * Return the route method
	 * @return [type] [description]
	 */
	public function getMethod()
	{
		return $this->method;
	}
	/**
	 * Return the route uri
	 * @param Route $route [description]
	 */
	public function getUri()
	{
		return $this->uri;
	}
	public function getRegex()
	{
		return $this->regex;
	}
	public function getController()
	{
		return $this->controller;
	}
	public function setCompiled()
	{
		$this->regex = preg_replace(
			'/\{([\w]+)}/', '(?P<$1>[^/]++)', $this->uri
		);

		/*preg_match(
			"/".str_replace("/", "\/", $this->regex)."/", 
			$requestUri, $matches
		);

		return $this->unsetNoMatchesKey($matches);*/
	}
	public function formatRegex()
	{
		$this->regex = "#^/{$this->regex}$#s";
	}
	public function matches($routes, string $requestUri)
	{
		$this->setCompiled();
		$this->formatRegex();
	}

	private function unsetNoMatchesKey(array $matches = NULL)
	{
		// Remove all unncessary key
		foreach ($matches as $key => $value) {
		    if (is_int($key)) 
		        unset($matches[$key]);
		}
		return $matches;
	}
}
