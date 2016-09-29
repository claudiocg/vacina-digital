<?php

namespace Framework\Database;

use PDO;

class Connection
{
	protected $pdo;

	public function __construct(array $config)
	{
		try {
			$this->pdo = new PDO(
				"mysql:host={$config['host']};dbname={$config['name']}", 
				$config['username'],
			 	$config['password'], 
			 	$config['options']
		 	);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function selectStatement(string $table, string $query, array $values)
	{
		$statement = $this->pdo->prepare($query);
		$statement->execute($values);
		return $statement->fetchAll(PDO::FETCH_CLASS, "App\\Model\\".ucfirst($table));
	}
	public function statement(string $query, array $values)
	{
		$statement = $this->pdo->prepare($query);
		$statement->execute(array_values($values));

		return $this->pdo->lastInsertId();
	}
	public function updateStatement(string $query, array $values)
	{
		$statement = $this->pdo->prepare($query);
		return $statement->execute($values);
	}
}