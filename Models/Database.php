<?php

class Database
{
	private $_connexion;
	
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
		


		$this->_dbname = 'guestForm';
		
		$this->_dbh = new PDO('pgsql:dbname='.$this->_dbname.';host='.$this->_host, $this->_username, $this->_password);
		

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
	
	public function getLastInsertId($table)
	{

		
		return $this->_dbh->lastInsertId($table."_id_seq");
		
	}
	
	public function execute($query)
	{
		// Execution de $query et retour résultat en tableau
		$exe = $this->_dbh->prepare( $query );
		$exe->execute();
		return $exe;


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
	
	public function getResultats($query)
	{
		return $this->execute($query)->fetchAll();		
	}
	
}

/*
 * 
 */
?>
