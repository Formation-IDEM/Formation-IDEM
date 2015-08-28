<?php


class Database {
	
	
	private static $_instance;
	private $_host;
	private $_user;
	private $_password;
	private $_dbname;
	private $_db;


	private function __construct() {
		$this->_host = '127.0.0.1';
		
		$this->_user = 'postgres';
		
		$this->_password = 'postgres';
		
		$this->_dbname = 'gestform';
		
		$this->connect();
	}
	
	// Fonction pour récupérer une seule et unique instance de App
	public static function getInstance() {
		if( ! self::$_instance ) {
			self::$_instance = new Database();
		}
		return self::$_instance;
	}


	public function connect($dbtype = 'pgsql') {
		
		$this->_db = new PDO( $dbtype . ':dbname=' . $this->_dbname . ';host=' . $this->_host, $this->_user, $this->_password );
		
		return $this;
	}


	public function execute($query) {
		return $this->_db->exec( $query );
	}
	
	public function getLastInsertId() {
		return $this->_db->lastInsertId();
	}
	
	public function getResultats($query) {
		$exe = $this->execute( $query );
		if( $exe ) {
			return $exe->fetchAll();
		}
		return false;
		
	}


}

?>