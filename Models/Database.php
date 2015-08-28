<?php

class Database
{
	
	private static $_instance;
	
	private $_host;
	
	private $_username;
	
	private $_password;

<<<<<<< HEAD

	private function __construct() {
		$this->_host = '127.0.0.1';
		
		$this->_user = 'postgres';
		
		$this->_password = 'postgres';
		
		$this->_dbname = 'gestform';
		
		$this->connect();
=======
	private $_dbname;
	
	private $_dbh;
			
	private function __construct()
	{
		$this->_host = 'localhost';
		$this->_username = 'homestead';
		$this->_password = 'secret';
		$this->_dbname = 'gestForm';
		
		$this->_dbh = $this->initialConnection(); 
>>>>>>> entreprises
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

<<<<<<< HEAD

	public function connect($dbtype = 'pgsql') {
		
		$this->_db = new PDO( $dbtype . ':dbname=' . $this->_dbname . ';host=' . $this->_host, $this->_user, $this->_password );
		
		return $this;
=======
	/**
	 * Retourne un tableau d'erreurs
	 *
	 * @return array
	 */
	public function getErrors()
	{
		return $this->_dbh->errorInfo();
>>>>>>> entreprises
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

<<<<<<< HEAD
	public function execute($query) {
		return $this->_db->exec( $query );
	}
	
	public function getLastInsertId() {
		return $this->_db->lastInsertId();
=======
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
>>>>>>> entreprises
	}
	
	public function getResultats($query) {
		$exe = $this->execute( $query );
		if( $exe ) {
			return $exe->fetchAll();
		}
		return false;
		
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