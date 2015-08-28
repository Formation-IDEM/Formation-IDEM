<?php

/**
 * Class App
 */
class App
{
	private static $_instance;
	private $_actionName;
	
	private function __construct()
	{
		$this->_actionName = 'indexAction';
	}

	/**
	 * Retourne l'instance d'App
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
	 * Retourne une collection
	 *
	 * @param $type
	 * @return null
	 */
	public static function getCollection($type)
	{
		if(file_exists('./Models/Collections/' . ucfirst($type) . 'Collection.php'))
		{
			include_once('./Models/Collection.php');
			include_once('./Models/Collections/' . ucfirst($type) . 'Collection.php');
			$typeCollection = ucfirst($type) . 'Collection';
			return new $typeCollection;
		}

		return null;
	}

	/**
	 * Retourne un modèle en fonction de son nom
	 *
	 * @param $type
	 * @return null
	 */
	public static function getModel($type)
	{
		if( file_exists('./Models/'.$type.'.php') )
		{
			include_once('Models/Model.php');			
			include_once('Models/'.$type.'.php');

			$type = ucfirst($type);
			return new $type();
		}
		return null;
	}

	/**
	 * Définit l'action courante
	 *
	 * @return $this
	 */
	public function setActionName()
	{
		if( isset($_GET['a']) && $_GET['a'] != null )
		{
			$this->_actionName = htmlspecialchars($_GET['a']) . 'Action';
		}
		return $this;
	}

	/**
	 * Lancement de l'application
	 */
	public function run()
	{
		// inclusion système de template
		include_once('Models/Template.php');

		// inclusion système de db
		include_once('Models/Database.php');
		
		// Récupère l'action
		$action = self::getInstance()->setActionName()->_actionName;
		
		// Creation du Controller en fonction de $_GET['c']
		include_once('./Controllers/ControllerFactory.php');
		$controller = ControllerFactory::createController();
		if( method_exists($controller,$action) )
		{
			$controller->$action();
		}
		else
		{
			header("HTTP/1.0 404 Not Found");
			die;
		}
	}	
}