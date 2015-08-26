<?php
class Database{

	private static $_instance;
	private $_host;
	private $_username;
	private $_password;
	private $_dbname;
	private $_dbh;

	private function __construct(){

		$this->_host = '127.0.0.1';
		$this->_username = 'postgres';
		$this->_password = 'postgres';
		$this->_dbname = 'gestform';
		$this->_dbh = $this->initialConnection();
	}

	// Fonction pour récupérer une seule et unique instance de App

	public static function getInstance(){

		if(!self::$_instance){
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

	public function initialConnection($dbtype = 'pgsql'){
		
		return new PDO($dbtype.':dbname='.$this->_dbname.';host='.$this->_host, $this->_username, $this->_password);
	}

	public function getConnexion(){

		return $this->_dbh;
	}

	public function getLastInsertId() {

	return $this->_dbh->lastInsertId();

	}

	public function getResultat($query){

		// Execution de $query et retour résultat en tableau
		$exe = $this->_dbh->prepare($query);
		$exe->execute();
		$datas = $exe->fetchAll();

		//Ici on return le resultat mais sur le première element
		//Celui qui contient le tableau
		return $datas[0];
	}

	public function getResultats($query){

		// Execution de $query et retour résultat en tableau
		$exe = $this->_dbh->prepare($query);
		$exe->execute();


		$datas = $exe->fetchAll();

		//Ici on return le résultat mais sur le premier élément
		//Celui qui contient le tableau
		return $datas;
	}
}
?>