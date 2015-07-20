<?php 

/**
 * Connexion a la base de donnée
 */
class DataBase{
	
	//initialisation de l'instance a null
	private static $_instance = null;
	private $dbname;
	private $dsn;
	private $username;
	private $password;
	
	private function __construct($dbname, $dsn, $username, $password) {
		
		$this->dbname = 'notrebase';
		$this->dsn = 'localhost';
		$this->username = 'postgres';
		$this->password = 'postgres';
		
	}
	
	public function setConnexion(){
		
	return $bdd = PDO::__construct ( 'dbname='.$this->dbname.';host='.$this->dsn,  $this->username , $this->password );
	
	}
	
	
	public static function getInstance(){
		
		//vérification si l'instance est set
		if(!self::$_instance){
		
			self::$_instance = new DataBase();
		
		}
			
		return self::$_instance;
		
	}
}





?>