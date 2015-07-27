<?php


class Database {
	
	
	private static $_instance;
	private $_host;
	private $_user;
	private $_password;
	private $_dbname;
	private $_db;


	private function __construct() {
		$this->_host = 'localhost';
		
		$this->_username = 'root';
		
		$this->_password = 'root';
		
		$this->_dbname = 'bdd_formationidem';
	}
	
	// Fonction pour récupérer une seule et unique instance de App
	public static function getInstance() {
		if( ! self::$_instance ) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}


	public function connect($dbtype = 'mysql') {
		$this->_db = new PDO( $dbtype . ':dbname=' . $this->_dbname . ';host=' . $this->_host, $this->_username, $this->_password );
		return $this;
	}


	private function execute($query) {
		// Execution de $query et retour résultat en tableau
		$exe = $this->_db->prepare( $query );
		$exe->execute();
		return $exe->fetchAll();
	}

}

?>