<?php
namespace Core\Database;

/**
 * Class QueryBuilder
 *
 * @package Core\Database
 */
class QueryBuilder
{
	private $fields = [];
	private $conditions = [];
	private $from = [];

	/**
	 * Méthode de sélection des champs
	 *
	 * @return $this
	 */
	public function select()
	{
		$this->fields = func_get_args();
		return $this;
	}

	/**
	 * Méthode Where
	 *
	 * @return $this
	 */
	public function where()
	{
		foreach( func_get_args() as $conditions )
		{
			$this->conditions[] = $conditions;
		}
		return $this;
	}

	/**
	 * Table où sélectionner les données
	 *
	 * @param $table
	 * @return $this
	 */
	public function from($table)
	{
		$this->from[] = $table;
		return $this;
	}

	/**
	 * On convertit les données en requête
	 *
	 * @return string
	 */
	public function __toString()
	{
		return 'SELECT ' . implode(', ', $this->fields)
			. ' FROM ' . implode(', ', $this->from)
			. ' WHERE ' . implode(' AND ', $this->conditions);
	}
}