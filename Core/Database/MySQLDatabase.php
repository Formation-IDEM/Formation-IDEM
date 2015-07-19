<?php
namespace Core\Database;

use \PDO;

class MySQLDatabase extends Database
{
	protected $pdo;

	protected $db_name;
	protected $db_user;
	protected $db_pass;
	protected $db_host;

	public function __construct($db_name)
	{
		parent::__construct($db_name);
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
	 * @param      $class_name
	 * @param bool $one
	 * @return array|mixed
	 */
	public function query($statement, $class_name = null, $one = false)
	{
		$sql = $this->getPDO()->query($statement);
		if( $class_name === null )
		{
			$sql->setFetchMode(PDO::FETCH_OBJ);
		}
		else
		{
			$sql->setFetchMode(PDO::FETCH_CLASS, $class_name);
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
	 * @param      $class_name
	 * @param bool $one
	 * @return array|mixed
	 */
	public function prepare($statement, $attributes, $class_name = null, $one = false)
	{
		$query =  $this->getPDO()->prepare($statement);
		$query->execute($attributes);
		if( $class_name === null )
		{
			$query->setFetchMode(PDO::FETCH_OBJ);
		}
		else
		{
			$query->setFetchMode(PDO::FETCH_CLASS, $class_name);
		}
		$data = $one ? $query->fetch() : $query->fetchAll();

		return $data;
	}
}