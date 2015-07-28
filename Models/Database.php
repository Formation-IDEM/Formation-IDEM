<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en prive
    class Database {
    	
    	private static $_instance;
    	private $_db;
    	
    	private function __construct() {
    		$this->connect();
    	}

    	public static function getInstance() {
    		if (!self::$_instance){
    			self::$_instance = new Database();
    		}
    		return self::$_instance;
    	}
    	 
    	public function connect() {
    		if( !$this->_db )
    		{
    			$this->_db = new PDO("pgsql:host=localhost;dbname=gestForm","postgres","admin");	
    		}
    		return $this;
    	}
		
		public function execute($query) {
			return $this->_db->query($query);
		}
		
		public function getResultats($query) {	
			$exe=$this->execute($query);
			return $exe->fetchAll();
		}
		
    		public function getResultat($query) {
			$exe=$this->execute($query);
			return $exe->fetch(PDO::FETCH_ASSOC);	
		}
		
    }
?>