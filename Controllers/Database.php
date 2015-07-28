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
		
<<<<<<< HEAD
		private $_connexion = null;
		
		private function __construct() {
=======
		private function __construct() {
			
>>>>>>> cd98160eaca846585c6d0c3eb9c9c46e6c3f918c
			$this->_dbname='gestform';
			$this->_pathDb='localhost';
			$this->_username='postgres';
			$this->_password='postgres';
			
<<<<<<< HEAD
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
		
=======
		}
		
		public function ConnectDatabase(){
			
			return $db = new PDO ('pgsql:dbname='.$this->_dbname.';host='.$this->_pathDb, $this->_username, $this->_password );
			
		}
		
>>>>>>> cd98160eaca846585c6d0c3eb9c9c46e6c3f918c
		public static function getInstance(){
			if (!self::$_instance) {
					
				self::$_instance = new Database();
		
<<<<<<< HEAD
			}
		
		return self::$_instance;
		
		}
	}

=======
		}
		
		return self::$_instance;
		
	}


>>>>>>> cd98160eaca846585c6d0c3eb9c9c46e6c3f918c
?>