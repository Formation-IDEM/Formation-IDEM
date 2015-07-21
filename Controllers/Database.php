<?php

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
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	
}
?>