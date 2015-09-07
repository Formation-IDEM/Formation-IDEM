<?php
namespace App;

use Core\Factories\CollectionFactory;
use Core\Factories\ModelFactory;
use \Core\Router\Router;
use \Core\Factories\DatabaseFactory;

/**
 * Class App
 *
 * @package App
 */
class App
{
	public static $title = 'GestForm';

	private $_db_instance;
	private static $_instance;
	private static $_router_instance;

	/**
	 * Retourne l'instanciation
	 *
	 * @return \App
	 */
	public static function getInstance()
	{
		if( is_null(self::$_instance) )
		{
			self::$_instance = new App();
		}
		return self::$_instance;
	}

	/**
	 * Lance l'application et charge les autoloaders
	 */
	public static function run()
	{
		session_start();
		require_once(ROOT . 'App/Autoloader.php');
		\App\Autoloader::register();
		require_once(ROOT . 'Core/Autoloader.php');
		\Core\Autoloader::register();
	}

	/**
	 * Raccourci pour les routes
	 *
	 * @return \Core\Router\Router
	 */
	public static function route()
	{
		if( is_null(self::$_router_instance) )
		{
			self::$_router_instance = new Router(request()->getData('url'));
		}
		return self::$_router_instance;
	}

	/**
	 * Charge un modèle
	 *
	 * @param $model
	 * @return ModelFactory
	 */
	public static function getModel($model)
	{
		return ModelFactory::loadModel($model);
	}

	/**
	 * Charge une collection
	 *
	 * @param $collection
	 * @return CollectionFactory
	 */
	public static function getCollection($collection)
	{
		return CollectionFactory::loadCollection($collection);
	}

	/**
	* Retourne une instance de la base de donnée
	*
	* @return \App\Database
	*/
	public function getDB()
	{
		if( is_null($this->_db_instance) )
		{
			$this->_db_instance = DatabaseFactory::initDB();
		}
		return $this->_db_instance;
	}
}