<?php
/**
 * Config.php
 */

class Config
{
	private static $_instance;
	private $config = [];

	/**
	 * Instanciation de la classe
	 *
	 * @return \App
	 */
	public static function getInstance()
	{
		if( is_null(self::$_instance) )
		{
			self::$_instance = new Config();
		}
		return self::$_instance;
	}

	/**
	 * Charge un fichier de configuration
	 *
	 * @param $fichier
	 */
	public function load($fichier)
	{
		if( is_file(dirname(__DIR__) . '/Config/' . $fichier . '.php') )
		{
			$this->config = require(dirname(__DIR__) . '/Config/' . $fichier . '.php');
		}
	}

	/**
	 * Récupère une clé de configuration
	 *
	 * @param $key
	 * @return mixed
	 */
	public function get($key)
	{
		if( array_key_exists($key, $this->config) )
		{
			return $this->config[$key];
		}
		return null;
	}
}