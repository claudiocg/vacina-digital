<?php

namespace Framework\Routing;

use Exception;

class Router
{
    public function __construct()
    {
        $this->routes = new RouteCollection;
    }
    /**
     * Load the routes.php file in root directory
     * @param  string $file       The routes.php file
     * @return Framework\Router   Return self    
     */
    public static function load(string $file)
    {
        $router = new static;

        require $file;

        return $router;
    }
    public function get(string $uri, $controller)
    {
        $this->routes->add($this->createRoute('GET', $uri, $controller));
    }
    public function post(string $uri, $controller)
    {
        $this->routes->add($this->createRoute('POST', $uri, $controller));
    }
    public function patch(string $uri, $controller)
    {
        $this->routes->add($this->createRoute('PATCH', $uri, $controller));
    }
    public function delete(string $uri, $controller)
    {
        $this->routes->add($this->createRoute('DELETE', $uri, $controller));
    }
    /**
     * Create a new Route
     * @param  string $method     [description]
     * @param  string $uri        [description]
     * @param  string $controller [description]
     * @return Framework\Routing\Route             [description]
     */
    public function createRoute(string $method, string $uri, string $controller)
    {
        return new Route($method, $uri, $controller);
    }

    /**
     * Dispatch to the right Controller
     * @param  [type] $uri    [description]
     * @param  [type] $method [description]
     * @return [type]         [description]
     */
    public function direct($uri, $method)
    {
        $path = $uri == '/' ? '/' : "/{$uri}";
        // Find the first ocurrence from routes
        foreach ($this->routes->routes[$method] as $key => $route) {
            if (preg_match($route->getRegex(), $path) == true) {

                $this->setRequest($route->getRegex(), $path);

                list($controller, $action) = explode("@", $route->getController());
              
                $controller = "App\\Controller\\{$controller}";
                $controller = new $controller;
                return $controller->$action();
            }
        }
        throw new Exception("Route {$uri} not found");
    }
    public function setRequest(string $regex, string $path)
    {
        preg_match($regex, $path, $matches);

        $matches = $this->unsetNoMatchesKey($matches);

        foreach ($matches as $key => $value) {
            container('request')->request->query->set($key, $value);
        }
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
