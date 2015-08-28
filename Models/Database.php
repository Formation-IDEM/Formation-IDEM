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
		
		$this->connect();
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


	public function execute($query) {
		var_dump($query);
		return $this->_db->exec( $query );
	}
	
	public function getResultats($query) {
		$exe = $this->execute( $query );
		return $exe->fetchAll();
	}
	
	public function getLastInsertId() {
		return $this->_db->lastInsertId();
	}

}

?>