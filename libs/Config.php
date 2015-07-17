<?php
/**
 * Config.php
 */

class Config
{
	private $config = [];

	public function __construct(){}

	/**
	 * Charge un fichier de configuration
	 *
	 * @param $fichierConfig
	 */
	public function load($fichierConfig)
	{
		if( is_file(dirname(__DIR__) . 'Config/' . $fichierConfig . '.php') )
		{
			$this->config = require(dirname(__DIR__) . 'Config/' . $fichierConfig . '.php');
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
		if( array_key_exists($this->config[$key]) )
		{
			return $this->config[$key];
		}
		return null;
	}
}