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
		
		$this->_dbname = 'idem';
		
		$this->_dbh = new PDO($dbtype.':dbname='.$this->_dbname.';host='.$this->_host, $this->_username, $this->_password);
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
		return $this->_dbh->exec( $query );
	}
	
	public function getResults($query)
	{
		$exe = $this->execute( $query );
		return $exe->fetchAll();			
	}
	
	public function getResult($query)	//faire une methode idem ci dessus pour n'avoir qu'un seul retour
	{
		$exe = $this->execute( $query );
		return $exe->fet();			
	}
	
	
	
	public function getLastInsertId()		//retourne le dernier id rentré
	{		
		return $this->_db->lastInsertId();
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
}



/*$result = $this->_connexion->query($req);
		if ($result)
		{
			$donnees = $result->fetchAll();
			return $donnees;
		}else
			{
				echo "Nada!";
			}*/
?>