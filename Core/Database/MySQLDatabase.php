<?php
namespace Core\Database;

use \PDO;

/**
 * Class MySQLDatabase
 *
 * @package Core\Database
 */
class MySQLDatabase extends Database
{
	private $pdo;

	public function __construct($db_name, $db_user, $db_pass, $db_host)
	{
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_pass = $db_pass;
		$this->db_host = $db_host;
	}

	/*
	  * Retourne une instance de PDO
	  */
	protected function getPDO()
	{
		if( $this->pdo === null )
		{
			$pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->pdo = $pdo;
		}

		return $this->pdo;
	}

	/**
	 * Exécute une requête et retourne un résultat ou un tableau
	 * content des résultats
	 *
	 * @param      $statement
	 * @param bool $one
	 * @param bool $asArray
	 * @return array|mixed
	 */
	public function query($statement, $one = false, $asArray = false)
	{
		$sql = $this->getPDO()->query($statement);
		if( $asArray )
		{
			$sql->setFetchMode(PDO::FETCH_ASSOC);
		}
		else
		{
			$sql->setFetchMode(PDO::FETCH_OBJ);
		}

		$data = $one ? $sql->fetch() : $sql->fetchAll();
		return $data;
	}

	/**
	 * Exécute une requête préparée avec des attributs et retourne
	 * un résultat ou un tableau contenant des résultats
	 *
	 * @param      $statement
	 * @param      $attributes
	 * @param bool $one
	 * @param bool $asArray
	 * @return array|mixed
	 */
	public function prepare($statement, $attributes, $one = false, $asArray = false)
	{
		$query =  $this->getPDO()->prepare($statement);
		$query->execute($attributes);
		if( $asArray )
		{
			$query->setFetchMode(PDO::FETCH_ASSOC);
		}
		else
		{
			$query->setFetchMode(PDO::FETCH_OBJ);
		}


		$data = $one ? $query->fetch() : $query->fetchAll();
		return $data;
	}

	/**
	 * Exécute une requête qui ne retourne pas de résultat
	 *
	 * @param       $statement
	 * @param array $attributes
	 * @return bool|\PDOStatement
	 */
	public function execute($statement, $attributes = [])
	{
		if( !empty($attributes) )
		{
			$query = $this->getPDO()->prepare($statement);
			return $query->execute($attributes);
		}
		else
		{
			return $query = $this->getPDO()->query($statement);
		}
	}

	/**
	 * Retourne la dernière ID enregistrée
	 *
	 * @return string
	 */
	public function lastInsertId($table = '')
	{
		return $this->getPDO()->lastInsertId();
	}

	/**
	 * @param $table
	 * @param string $field
	 * @param string $where
	 * @return mixed
	 */
	public function count($table, $field = '*', $where = '')
	{
		$sql = $this->getPDO()->query('SELECT COUNT(' . $field . ') AS total_item FROM ' . $table);
		$sql->setFetchMode(PDO::FETCH_ASSOC);
		if( !empty($where) )
		{
			$sql .= ' WHERE ' . $where;
		}

		$count = $sql->fetch();
		return $count['total_item'];
	}
}