<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en prive
    abstract class Database {
    	
    	private static $_instance;
    	private $_connexion;
    	
    	private function __construct() {
    		$this->setConnexion();
    	}
    	
    	private function setConnexion()
    	{
    		if( !$this->_connexion )
    		{
    			$this->_connexion = new PDO("pgsql:host=localhost;dbname=gestForm","postgres","postgres");
    		}
    		return $this;
    	}
		
		public static function getResultats($req) {
			$resultat = $this->_connexion->query($req);
			if ($resultat){
				$donnees = $resultat->fetchAll();
				return $donnees;
			}
			return array();
		}
		
		public static function getInstance() {
			if (!self::$_instance){
				self::$_instance = new Database();
			}
			return self::$_instance;
		}
		
    }
?>