<?php

/**
 * Class Database
 */
class Database
{
	private static $_instance;
	
	private $_host;
	
	private $_user;
	private $_password;
	private $_dbname;
	private $_dbh;
			
	private function __construct()
	{
		include_once('./config.php');
		$this->_host = $db_host;
		$this->_username = $db_user;
		$this->_password = $db_pass;
		$this->_dbname = $db_database;
		$this->_dbh = $this->initialConnection(); 
	}
	
	// Fonction pour récupérer une seule et unique instance de App
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	/**
	 * Retourne un tableau contenant les erreurs de requête
	 *
	 * @return array
	 */
	public function getErrors()
	{
		return $this->_dbh->errorInfo();
	}

	/**
	 * Retourne la dernière ID insérée
	 *
	 * @param $table
	 * @return string
	 */
	public function getLastInsertId($table)
	{
		return $this->_dbh->lastInsertId($table.'_id_seq');
	}

	/**
	 * Etablit la connexion
	 *
	 * @param string $dbtype
	 * @return PDO
	 */
	public function initialConnection($dbtype = 'pgsql')
	{
		return new PDO($dbtype.':dbname='.$this->_dbname.';host='.$this->_host, $this->_username, $this->_password);
	}

	/**
	 * Récupère les connexions
	 *
	 * @return PDO
	 */
	public function getConnection()
	{
		return $this->_dbh;
	}

	/**
	 * Exécute une requête sans retourne de résultat
	 *
	 * @param $query
	 * @return PDOStatement
	 */
	public function execute($query)
	{
		$exe = $this->_dbh->prepare($query);
		$exe->execute();
		var_dump($exe);
		return $exe;
	}

	/**
	 * Exécute une requête en retournant des résultats
	 *
	 * @param $query
	 * @return array
	 */
	public function getResults($query)
	{
		// Execution de $query et retour résultat en tableau
		return $this->execute($query)->fetchAll();
	}

	/**
	 * Exécute une requête en retournant un résultat
	 *
	 * @param $query
	 * @return mixed
	 */
	public function getResult($query)
	{
		return $this->execute($query)->fetch();
	}

	public function count($table, $field = '*', $where = '')
	{
		$sql  = 'SELECT COUNT(' . $field . ') AS total FROM ' . $table;
		$result = $this->getResult($sql);
		return $result['total'];
	}
}