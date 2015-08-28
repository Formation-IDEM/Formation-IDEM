<?php

class Database
{
	
	private static $_instance;
	
	private $_host;
	
	private $_username;
	
	private $_password;

	private $_dbname;
	
	private $_dbh;
			
	private function __construct()
	{
		$this->_host = 'localhost';
		$this->_username = 'root';
		$this->_password = 'root';
		$this->_dbname = 'gestForm';
		
		$this->_dbh = $this->initialConnection(); 
	}

	/**
	 * Récupère une instance de la base de donnée
	 *
	 * @return Database
	 */
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	/**
	 * Retourne un tableau d'erreurs
	 *
	 * @return array
	 */
	public function getErrors()
	{
		return $this->_dbh->errorInfo();
	}

	/**
	 * Retourne la dernière ID
	 *
	 * @param $table
	 * @return string
	 */
	public function getLastInsertId($table)
	{
		return $this->_dbh->lastInsertId($table.'_id_seq');
	}

	/**
	 * Etablit la connexion à PostgreSQL
	 *
	 * @param string $dbtype
	 * @return PDO
	 */
	public function initialConnection($dbtype = 'pgsql')
	{
		return new PDO($dbtype.':dbname='.$this->_dbname.';host='.$this->_host, $this->_username, $this->_password);
	}

	/**
	 * Retourne la connexion
	 *
	 * @return PDO
	 */
	public function getConnection()
	{
		return $this->_dbh;
	}

	/**
	 * Exécute une requête sans retourner de résultats
	 *
	 * @param $query
	 * @return PDOStatement
	 */
	public function execute($query)
	{
		$exe = $this->_dbh->prepare($query);
		$exe->execute();
		return $exe;
	}

	/**
	 * Exécute une requête contenant des résultats
	 *
	 * @param $query
	 * @return array
	 */
	public function getResults($query)
	{
		// Execution de $query et retour résultat en tableau
		return $this->execute($query)->fetchAll();
	}

	public function getResult($query)
	{
		return $this->execute($query)->fetch();
	}
}

?>