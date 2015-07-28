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
		
		private $_connexion = null;
		
		private function __construct() {
			$this->_dbname='gestform';
			$this->_pathDb='localhost';
			$this->_username='postgres';
			$this->_password='postgres';
			
			$this->_connexion = $this->getConnexion();
		}
		
		public function getConnexion(){
			
			return new PDO ('pgsql:dbname='.$this->_dbname.';host='.$this->_pathDb, $this->_username, $this->_password );
			
			
		}
		
		public function execute($requete){
			var_dump($requete);
			$req = $this->_connexion->query($requete);
			if ($req) {
				 return $req;
			}else{
				return false;
			}
			
		}
		
		public function getResultats($requete){

			$res = $this->_connexion->query($requete);
	
			if ($res) {
				
				return $res->fetchAll();
				
			}else{
				echo "nul nul nul";;
			}


		}
		
		public function getLastInsertId($tableName) {
			return $this->_connexion->lastInsertId($tableName."_id_seq");
		}
		
		public static function getInstance(){
			if (!self::$_instance) {
					
				self::$_instance = new Database();
		
			}
		
		return self::$_instance;
		
		}
	}

?>