<?php

<<<<<<< HEAD
class Database{
	
	private static $_instance = null;
	
	public function __construct(){
		
		//Connexion à PostgresSQL
		$db = pg_connect("host=localhost port=5432 dbname=gestform user=postgres password=postgres");
		
		//Vérifie si erreur connexion
		if(!$db){
			echo "Une erreur est survenue";
			exit;
		}else{
			return $db;
		}
	}

	public static function getInstance(){

		//Vérifie s'il n'y a pas d'instance
		if(!self::$_instance){
=======
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
>>>>>>> 459d5f36845054875cd6af5310157fd8db4d92e7
			self::$_instance = new Database();
		}
		return self::$_instance;
	}
<<<<<<< HEAD

	
}
=======
	
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

>>>>>>> 459d5f36845054875cd6af5310157fd8db4d92e7
?>