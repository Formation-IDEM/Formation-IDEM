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

	
	private function execute($query)
	{
		// Execution de $query et retour résultat en tableau
		$exe = $this->_dbh->prepare($query);
		$exe->execute();
		return $exe->fetchAll();
	}
	
	public function insert($table, $fields, $values)
	{
		$query = 'INSERT INTO '.$table.' ('.$fields.') VALUES ('.$values.');';
		return $this->execute($query);
	}
	
	public function update($table, $set, $where)
	{
		$query = 'UPDATE '.$table.' SET '.$set.' WHERE '.$where.';';
		return $this->execute($query);
	}

	public function delete($table, $where)
	{
		$query = 'DELETE FROM '.$table.' WHERE '.$where.';';
		return $this->execute($query);
	}
	
	public function getResultats($requete){
		
		$resultat = $this->_dbh->query($requete);
		
		if($resultat){
			
			$donnees = $resultat->fetchAll();
			
			return $donnees;
			
		} else {
			
			echo 'requete pourri';
			
		}
		
		
	}
	
}

?>