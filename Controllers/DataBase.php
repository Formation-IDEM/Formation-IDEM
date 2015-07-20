<?php 

/**
 * Connexion a la base de donnée
 */
class DataBase{
	
	//initialisation de l'instance a null
	private static $_instance = null;
	private $dbname = 'gestform';
	private $dsn = 'localhost';
	private $username = 'postgres';
	private $password = 'postgres';
	
	private function __construct() {
		
		$this->dbname;
		$this->dsn;
		$this->username;
		$this->password;
		
		return $bdd = new PDO( 'pgsql:dbname='.$this->dbname.';host='.$this->dsn,  $this->username , $this->password );
	}
	
	
	
	public static function getInstance(){
		
		
		if(connect == null){
			
			new __construct();
			
		}
		
		return $bdd;
		
		
	}
}




?>


