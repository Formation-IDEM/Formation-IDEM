<?php


class App {
	
	private static $_instance;
	
	private $_controller;
	private $_actionName;


	/*
	 * 
	 */
	private function __construct() {
		
		
		include_once("Models/Database.php");

		$this->setController();
		$this->setActionName();
	}
	
	/*
	 * Fonction pour récupérer une seule et unique instance de App
	 */
	public static function getInstance() {
		if( ! self::$_instance ) {
			self::$_instance = new App();
		}
		return self::$_instance;
	}

	/*
	 * 
	 */
	public function setActionName() {
		$this->_actionName = 'indexAction';
		
		if( isset( $_GET['a'] ) && method_exists( $this->_controller, $_GET['a'] . 'Action') ) {
			$this->_actionName = $_GET['a'] . 'Action';
		}
		return $this;
	}
	

	/*
	 * 
	 */
	public function setController() {
		// Creation du Controller en fonction de $_GET['c']
		include_once ('./Controllers/ControllerFactory.php');
		$this->_controller = ControllerFactory::createController();
		return $this;
	}
	
	
	/*
	 * Retourne une instance d'un modèle 
	 */
	public static function getModel( $type ) {
		if( file_exists("Models/" . $type . ".php") ) {
			include_once("Models/Model.php");
			include_once("Models/" . $type . ".php");
			return new $type();
		}
		return null;
	}
	
	/*
	 * Retourne une instance d'une collection 
	 */
	public static function getCollection( $type ) {
		if( file_exists("Models/Collections/" . $type . "Collection.php") ) {
			$type = $type. "Collection";
			include_once("Models/Collection.php");
			include_once("Models/Collections/" . $type . ".php");
			
			return new $type();
		}
		return null;
	}
	
	
	/* 
	 * Fonction appelée par défaut
	 */
	public function run() {
		
		
		// Récupère l'action
		$action = $this->_actionName;
		
		$this->_controller->$action();
		
	}


}

?>