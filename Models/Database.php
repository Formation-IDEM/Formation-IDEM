<?php

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
		$this->_host = '127.0.0.1';
		
		$this->_username = 'postgres';
		
		$this->_password = 'postgres';
		
		$this->_dbname = 'idem';
		
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

	public function getErrors()
	{
		return $this->_dbh->errorInfo();
	}
	
	public function getLastInsertId($table)
	{
		return $this->_dbh->lastInsertId($table.'_id_seq');
	}
	
	public function initialConnection($dbtype = 'pgsql')
	{
		return new PDO($dbtype.':dbname='.$this->_dbname.';host='.$this->_host, $this->_username, $this->_password);
	}
	
	public function getConnection()
	{
		return $this->_dbh;
	}
	
	public function execute($query)
	{
		$exe = $this->_dbh->prepare($query);
		$exe->execute();
		return $exe;
	}
	
	public function getResults($query)
	{
		// Execution de $query et retour résultat en tableau
		return $this->execute($query)->fetchAll();
	}
}

?>