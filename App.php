<?php
class App
{
	private static $_instance;
	
	private $_controllerName;
	
	private $_actionName;
	
	private function __construct()
	{
		$this->_actionName = 'indexAction';
	}

	/**
	 * Singleton
	 *
	 * @return App
	 */
	public static function getInstance()
	{
		if(!self::$_instance)
		{
			self::$_instance = new App();
		}
		return self::$_instance;
	}

	/**
	 * Charge une collection
	 *
	 * @param $type
	 * @return null
	 */
	public static function getCollection($type)
	{
		if(file_exists('./Models/Collections/'.$type.'Collection.php'))
		{
			//include_once('./Models/Collection.php');
			//include_once('./Models/Collections/'.$type.'Collection.php');
			$typeCollection = $type.'Collection';
			return new $typeCollection;
		}
		else
		{
			return null;
		}
	}

	/**
	 * Charge un modèle
	 *
	 * @param $type
	 * @return null
	 */
	public static function getModel($type)
	{
		if(file_exists('./Models/'.$type.'.php'))
		{
			//include_once('Models/Model.php');
			//include_once('Models/'.$type.'.php');
			return new $type();
		}
		else
		{
			return null;
		}
	}

	/**
	 * Définit le nom d'une action
	 *
	 * @return $this
	 */
	public function setActionName()
	{
		if(isset($_GET['a']) && $_GET['a'] != null)
		{
			$this->_actionName = $_GET['a'].'Action';
		}
		return $this;
	}

	/**
	 * Charge l'application
	 */
	public function run()
	{
		include_once('./Core/Autoloader.php');
		Autoloader::register();
		include_once('./Core/Helpers.php');

		// inclusion système de template
		//include_once('Models/Template.php');

		// inclusion système de db
		//include_once('Models/Database.php');
		
		// Récupère l'action
		$action = self::getInstance()->setActionName()->_actionName;
		
		// Creation du Controller en fonction de $_GET['c']
		//include_once('./Controllers/ControllerFactory.php');
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
}