<?php
namespace Core\Database;

use \Core\Database\Database;
/**
 * Class QueryBuilder
 *
 * @package Core\Database
 */
class QueryBuilder
{
	private $db;

	private $fields = [];
	private $conditions = [];
	private $from = [];

	public function __construct(Database $db)
	{
		$this->db = $db;
	}

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
	public function get($id = null)
	{
		if( is_null($id) )
		{
			$sql = 'SELECT ' . implode(', ', $this->fields)
			. ' FROM ' . implode(', ', $this->from)
			. ' WHERE ' . implode(' AND ', $this->conditions);

			return $this->db->prepare($sql, $this->conditions);
		}
		else
		{
			$sql = 'SELECT ' . implode(', ', $this->fields)
			. ' FROM ' . implode(', ', $this->from)
			. ' WHERE id = ?';

			return $this->db->prepare($sql, [$id], true);
		}

	}
}