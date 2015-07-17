<?php
/**
 * App.php
 */

class App
{
	private static $_instance;
	private $_db_instance;

	/**
	 * Instanciation de la classe
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
	 * Constructeur / Autoloader
	 */
	public function __construct()
	{
		require_once(__DIR__ . '/Autoloader.php');
		Autoloader::register();
	}

	/**
	 * @return mixed
	 */
	public function getDB()
	{
		$cfg = Config::getInstance();
		$cfg->load('database');
		if( is_null($this->_db_instance) )
		{
			$dbClass = $cfg->get('driver') . 'Database';
			$this->_db_intance = new $dbClass($cfg->get('host'), $cfg->get('name'), $cfg->get('user'), $cfg->get('pass'));
		}
		return $this->_db_instance;
	}

	/**
	 * Retourne le modèle utilisé
	 *
	 * @param $model
	 * @return mixed
	 */
	public function getModel($model)
	{
		$nomClass = ucfirst($model);
		return new $nomClass($this->getDB());
	}
}
