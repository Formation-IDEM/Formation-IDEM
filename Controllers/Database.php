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
	
	public function connect($dbtype = 'pgsql')
	{
		$this->_dbh = new PDO($dbtype.':dbname='.$this->_dbname.';host='.$this->_host, $this->_username, $this->_password);
		return $this;
	}
	
	private function execute($query)
	{
		// Execution de $query et retour résultat en tableau
		$exe = $this->_dbh->prepare($query);
		$exe->execute();
		return $exe->fetchAll();
	}
	
	public function insert()
	{
		$query = 'CREATE TABLE trainer(id SERIAL PRIMARY KEY,further_informations TEXT);';
		return $this->execute($query);
	}
}

?>