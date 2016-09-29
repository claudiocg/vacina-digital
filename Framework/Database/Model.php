<?php

namespace Framework\Database;

use Framework\Application;
use Framework\Database\QueryBuilder;
use ReflectionClass;
use ReflectionProperty;

abstract class Model
{
	/**
	 * Do QueryBuilder access from Model Childrens
	 * @param  [type] $name      [description]
	 * @param  [type] $arguments [description]
	 * @return [type]            [description]
	 */
	public static function __callStatic($method, $parameters)
    {
     	$instance = (new static)->queryBuilder();
        return call_user_func_array([$instance, $method], $parameters);
    }
	public function save()
	{
		$query = $this->queryBuilder();

        // Has register, edit
        if ($this->getAttribute('id')) {
            return $query->update((array)$this->getAttributes(), $this->table());
        }
        // Else, insert
		return $query->insert($this->getAttributes(), $this->table());
	}
	public function queryBuilder()
	{
		return new QueryBuilder($this->connection(), $this->table());
	}

	/**
	 * Retorna uma instacia da conexao
	 * @return PDO
	 */
	private function connection()
	{
		return Application::container('connection');
	}
	public function table()
	{
		return strtolower(
			str_replace("App\\Model\\", "", get_class($this))
		);
	}
    public function hasOne(string $model, string $key = null, string $foreignkey = null)
    {
        $attribute = strtolower(str_replace("App\\", "", $model));

        $result = $this->queryBuilder()
            ->setTable($attribute)
            ->select()
            ->where($key, $this->{$foreignkey})->get()->all();

        $this->setAttribute($attribute, $result[0]);

        return $this;
    }
	public function setAttribute($key, $value)
	{
		//$classReflection = new ReflectionClass(get_class($this));

		// Verifica se o atribuito foi instanciado no model
		//if ($classReflection->hasProperty($key))
		$this->{$key} = $value;
	}
	public function getAttribute($key)
	{
		return $this->{$key};
	}
	public function getAttributes()
	{
		return $this;
	}
	/**
     * Dynamically retrieve attributes on the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->getAttribute($key);
    }
    /**
     * Dynamically set attributes on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return void
     */
    public function __set($key, $value)
    {
        $this->setAttribute($key, $value);
    }
}
