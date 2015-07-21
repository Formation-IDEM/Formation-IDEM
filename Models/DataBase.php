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
	private $connexion_base;
	
	private function __construct() {
		
		$this->dbname;
		$this->dsn;
		$this->username;
		$this->password;

		
		return $this->connexion_base = new PDO( 'pgsql:dbname='.$this->dbname.';host='.$this->dsn,  $this->username , $this->password );
	}
	
	
	
	public static function getInstance(){
		
		
		if(connect == null){
			
			new __construct();
			
		}
		
		return $this->connexion_base;
		
	}
	
	public function getDsn(){
		return $this->dsn;
			
	}
	
	public function setDsn(){
		return $this->dsn = $newDsn;
			
	}
	
	public function getUsername(){
		return $this->username;
			
	}
	
	public function setUsername(){
		return $this->username = $newUsername;
			
	}
	
	public function getPassword(){
		return $this->password;
			
	}
	
	public function setPassword(){
		return $this->password = $newPassword;
			
	}
	
}




?>


