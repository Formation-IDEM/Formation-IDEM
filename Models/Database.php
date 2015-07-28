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
		$this->_host = '127.0.0.1';
		
		$this->_username = 'postgres';
		
		$this->_password = 'postgres';
		
		$this->_dbname = 'gestForm';
		
		$this->_dbh = new PDO('pgsql:dbname='.$this->_dbname.'; host='.$this->_host, $this->_username, $this->_password);
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
	
	
	public function getResults($query)
	{
		$queryResults = $this->_dbh->query($query);
		
			if($queryResults){
				
				return $queryResults->fetchAll();
				
			}else{
				
				echo "</br></br><center><b>Requete pourri!!!</b></center></br></br>";
				
			}
	}
	
	public function getLastInsertId($table){
		return $this->_dbh->lastInsertId($table.'_id_seq');
	}
}

?>