<?php

namespace Framework\Database;

use ReflectionClass;
use Framework\Database\DatabaseCollection as Collection;

class QueryBuilder
{
	/**
	 * Connection Instance
	 * @var Framework\Database\Connection
	 */
	protected $connection;

	/**
	 * Set the query Type e.g Select, Update, Insert, Delete
	 * @var string
	 */
	protected $sqlQuery;

	/**
	 * All wheres from query
	 * @var array
	 */
	protected $wheres = [];

	/**
	 * All where's values from query
	 * @var array
	 */
	protected $values = [];

	/**
	 * The table name
	 * @var string
	 */
	protected $table = "";

	protected $leftJoin = "";

	public function __construct(Connection $connection, $table = NULL)
	{
		$this->connection = $connection;

		if (!is_null($table))
			$this->setTable($table);
	}

	/**
	 * Make a select by ID as parameter
	 * @param  int  $id
	 * @param  array  $columns
	 * @return Framework\Database\DatabaseCollection
	 */
	public function find(int $id, array $columns = ['*'])
	{
		$query = $this->select($columns)->where('id', $id);
		return $query->first($columns);
	}
	/**
	 * Get the first result from query
	 * @param  array  $columns
	 * @return Framework\Database\DatabaseCollection
	 */
	public function first(array $columns = ['*'])
	{
		if (is_null($this->sqlQuery))
			$this->select($columns);

		$result = $this->selectStatement();

		if (is_null($result))
			return false;

		$collection = new Collection($result);

		return $collection->first();
	}
	/**
	 * Make a select string
	 * @param  array  $columns
	 * @return static
	 */
	public function select(array $columns = ['*'], string $alias = null)
	{
		$this->sqlQuery = 
			sprintf(
				"SELECT %s FROM %s",
				implode(', ', $columns),
				$this->table
			);

		if (!is_null($alias))
			$this->as($alias);

		return $this;
	}
	public function as(string $alias)
	{
		$this->sqlQuery .= " as {$alias}";
		return $this;
	}
	public function leftJoin(string $table, string $on)
	{
		$this->leftJoin = sprintf(" LEFT JOIN %s ON %s", $table, $on);
		$this->sqlQuery .= $this->leftJoin;
		return $this;
	}
	/**
	 * Format all wheres and values
	 * @param  string $column
	 * @param  mixed $comp
	 * @param  mixed $value
	 * @return static
	 */
	public function where(string $column, $comp, $value = NULL)
	{
		if ($value == NULL) {
			$value = $comp; 
			$comp = "=";
		}

		$this->values[$column] = $value;
		$this->wheres[$column] = "{$column} {$comp} :{$column}";

		return $this;
	}
	public function insert($values, string $table)
	{
		if (empty($values))
			return true;

		$values = (array)$values;

		$columns = 	implode(",", array_keys($values));
		$columnized = $this->columnize($values);

		$query = "INSERT INTO {$table}({$columns}) VALUES({$columnized})";

		$id = $this->connection->statement($query, $values);

		return $this->find($id);
	}
	public function update(array $values, string $table, string $where = null)
	{
		$columns = "";
		if (empty($values))
			return true;

		foreach ($values as $key => $value) {
			$columns .= "{$key}=:{$key},";
		}
		$columns = trim($columns, ',');

		if (is_null($where)) {
			$where = "id = :where";
			$values['where'] = $values['id'];
		} else {
			$values['where'] = $where; 
		}

		$query = "UPDATE {$table} SET {$columns} WHERE {$where}";

		$this->connection->updateStatement($query, $values);

		return $this->find($values['id']);
	}
	public function columnize(array $values)
	{
		$qmark = "";
		foreach ($values as $value)
			$qmark .= "?,";

		return trim($qmark, ",");
	}
	public function get()
	{
		$results = $this->selectStatement();

		if (is_null($results))
			return false;

		$collection = new Collection($results);

		return $collection;
	}
	public function makeQuery()
	{
		$where = "";
		if ($this->wheres != []) {
			$where = "WHERE ";
			foreach ($this->wheres as $value) {
				$where .= "$value AND ";
			}
			$where = trim($where, "AND ");
		}
		return "{$this->sqlQuery} {$where}";
	}
	public function setTable(string $table)
	{
		$this->table = $table;

		return $this;
	}
	public function selectStatement()
	{
		return $this->connection->selectStatement(
			$this->table, 
			$this->makeQuery(),
			$this->values
		);
	}
}
