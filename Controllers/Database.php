<?php

	/**
	 * 
	 */
	class Database{
		
		private static $_instance = null;
		private $_dbname;
		private $_pathDb;
		private $_username;
		private $_password;
		
		private function __construct() {
			
			$this->_dbname='gestform';
			$this->_pathDb='localhost';
			$this->_username='postgres';
			$this->_password='postgres';
			
		}
		
		public function ConnectDatabase(){
			
			return $db = new PDO ('pgsql:dbname='.$this->_dbname.';host='.$this->_pathDb, $this->_username, $this->_password );
			
		}
		
		public static function getInstance(){
			if (!self::$_instance) {
					
				self::$_instance = new Database();
		
		}
		
		return self::$_instance;
		
	}


?>