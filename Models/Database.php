<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en privé
    class Database {
    	
    	private static $_instance;
		
    	private function __construct() {
   		
    	}
		
		public static function getInstance() {
			if (!self::$_instance){
				self::$_instance = new Database();
			}
			return self::$_instance;
		}
		
		private function connexionBdd() {
		
		$mysqli = new mysqli("localhost", "root", "root", "bdd_monboncoin");
		if ($mysqli->connect_errno) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		return $mysqli;
	}
		
		
    }
?>