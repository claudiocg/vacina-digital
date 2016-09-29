<?php

namespace Framework\Database;

use ReflectionClass;

class DatabaseCollection
{
	public function __construct($all)
	{
		$this->add($all);
	}
	/**
	 * Add a route to DatabaseCollection
	 * @param Route $route [description]
	 */
	public function add($item)
	{
		$this->all = $item;

		return $this;
	}
	public function first()
	{
		if (is_array($this->all) && $this->all != [])
			return $this->all[0];
		return $this->all;
	}
	public function last()
	{
		if (is_array($this->all))
			return end($this->all);
		return $this->all;
	}
	public function all()
	{
		return $this->all;
	}
	public function __call($method, $parameters)
	{
		foreach ($this->all as $key => $item)
			$item->{$method} = $item->{$method}()->{$method};
	
		return $this;
	}
}
