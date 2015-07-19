<?php
use \Core\Http\Request;
use \Core\Http\Response;

class App
{
	public $title = 'GestForm';

	private $_db_instance;
	private static $_instance;

	private static $request;
	private static $response;

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

		self::$request = new Request();
		self::$response = new Response();
	}

	/**
	 * Retourne le modèle souhaité
	 *
	 * @param $name
	 * @return mixed
	 */
	public function getModel($name)
	{
		$className = '\\App\\Models\\' . ucfirst($name) . 'Model';
		return new $className($this->getDB());
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
			$cfg = \Core\Config::getInstance('Config');
			$this->_db_instance =  new \Core\Database\MySQLDatabase($cfg->get('db_name'), $cfg->get('db_user'), $cfg->get('db_pass'), $cfg->get('db_host'));
		}
		return $this->_db_instance;
	}

	/**
	 * Retourne une instance de la classe Request
	 *
	 * @return \Core\Request
	 */
	public static function request()
	{
		return self::$request;
	}

	/**
	 * Retourne une instance de la classé Response
	 *
	 * @return \Core\Response
	 */
	public static function response()
	{
		return self::$response;
	}

	/**
	* Retourne le titre de la page
	*
	* @return string
	*/
	public function getTitle()
	{
		return $this->title;
	}

	/**
	* Attribue un titre à la page
	*
	* @param $title
	*/
	public function setTitle($title)
	{
		$this->title = $title;
	}
}