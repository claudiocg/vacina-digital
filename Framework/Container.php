<?php

namespace Framework;

use Pimple\Container as PimpleContainer;

class Container
{
    public $container;

    public function __construct()
    {
        $this->container = new PimpleContainer();
    }
    public function register(string $name, $value)
    {
        $this->container->offsetSet($name, $value);
    }
    public function get(string $id)
    {
        return $this->container->offsetGet($id);
    }
}