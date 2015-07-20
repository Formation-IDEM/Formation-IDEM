<?php

// Utilisation App::getInstance();
class App
{
	private static $_instance;
	
	private $_controllerName;
	
	private $_actionName;
	
	private function __construct()
	{
		$this->_actionName = 'indexAction';
	}
	
	// Fonction pour récupérer une seule et unique instance de App
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new App();
		}
		return self::$_instance;
	}
	
	public function setActionName()
	{
		if(isset($_GET['a']) && $_GET['a'] != null)
		{
			$this->_actionName = $_GET['a'].'Action';
		}
		return $this;
	}
	
	// Fonction appelée par défaut
	public function run()
	{
		// Récupère l'action
		$action = $this->setActionName()->_actionName;
		
		// Creation du Controller en fonction de $_GET['c']
		include_once('./Controllers/ControllerFactory.php');				
		ControllerFactory::createController()->$action();
		
		//include_once('./Controllers/Database.php');
		//Database::getInstance()->connect('pgsql')->insert();
	}	
}


?>