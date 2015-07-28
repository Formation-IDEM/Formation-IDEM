<?php

// Utilisation App::getInstance();
include_once 'Models/Model.php';


class App extends Model
{
	private static $_instance;
	
	private $_controllerName;
	
	private $_actionName;
	
	public function __construct()
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
		include_once 'Models/Template.php';
		// Récupère l'action
		
		$action = self::getInstance()->setActionName()->_actionName;
		
		// Creation du Controller en fonction de $_GET['c']
		include_once('./Controllers/ControllerFactory.php');
		$controller = ControllerFactory::createController();
		if(method_exists($controller,$action))
		{
			$controller->$action();
		}
		else
		{
			header("HTTP/1.0 404 Not Found");
			die;
		}
	
		//include_once('./Controllers/Database.php');
		//Database::getInstance()->connect('pgsql')->insert();
	}
	
	public static function getModel($type)
	{
		if(file_exists($type))
		{
			include_once("Models/".$type.".php");
			return new $type();
		}else
			{
				return null;
			}
	}	
	
	public static function getCollection($name)
	{
		if(file_exists($name))
		{
			include_once("Collections/".$name.".php");
			return new $name();
		}else{
			return null;
		}
	}
}


?>