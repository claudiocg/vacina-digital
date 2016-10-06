<?php

namespace Framework;

use Framework\Container;
use Framework\Database\Connection;
use Framework\Database\QueryBuilder;
use Framework\Request;
use Framework\Routing\Router;
use Symfony\Component\Debug\Debug;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Application
{
    protected $config;

    protected $database;

    protected static $container;

    public function __construct($base_path = "")
    {
        $this->setContainer(new Container());

        $container = $this->container();

        $container->register('config', require 'config.php');
        $container->register(
            'connection',
            new Connection($container->get('config')['database'])
        );
        $container->register('request', new Request(SymfonyRequest::createFromGlobals()));
        $container->register('view', new View()); 

        $this->debug($container->get('config')['env']);
    }
    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }
    public static function container(string $id = NULL)
    {
        if ($id != NULL)
            return static::$container->get($id);
        return static::$container;
    }
    private function debug(string $env)
    {
        if ($env == 'development')
            return Debug::enable();
    }
    public function run()
    {
        $request = $this->container('request');

        return Router::load('routes.php')
            ->direct(
                trim($request->request->getRequestUri(),'/'), 
                $request->getMethod());
    }
}
