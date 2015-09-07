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

	public function url($url)
	{
		if( strpos($url, '/')) 
		{
			$params = explode('/', $url);
			$count = count($params);

			if( $count === 1 )
			{
				return '/index.php?c=' . $params[0]; 
			} 
			else if ( $count === 2 )
			{
				return '/index.php?c=' . $params[0] . '&a=' . $params[1]; 
			} 

			else if( $count === 3 )
			{
				if( is_numeric($params[1])) 
				{
					return '/index.php?c=' . $params[0] . '&a=' . $params[2] . '&id=' . $params[1];
				}
				else
				{
					return '/index.php?c=' . $params[0] . '&a=' . $params[1] . '&id=' . $params[2];
				}
				
			}
			
		}

		return $url;
	}

	public function logged()
	{
		return App::getModel('Profile')->logged();
	}

	public function profile()
	{
		return App::getModel('Profile')->profile();
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
		if(file_exists('./Models/Collections/'. ucfirst($type) . 'Collection.php'))
		{
			include_once('./Models/Collection.php');
			include_once('./Models/Collections/'. ucfirst($type). 'Collection.php');
			$typeCollection = ucfirst($type) . 'Collection';
			return new $typeCollection();
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
		if(file_exists('./Models/' . ucfirst($type) . '.php'))
		{
			include_once('Models/Model.php');
			include_once('Models/'.ucfirst($type).'.php');
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
			if(Auth::getInstance()->hasPermission())
			{
				$controller->$action();				
			}
			else
			{
				$controller = ControllerFactory::createController('noPermission');
				$controller->noPermission();
			}
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