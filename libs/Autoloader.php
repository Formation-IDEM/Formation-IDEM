<?php

/**
 * Autoloader.php
 */
class Autoloader
{
	/**
	 * Enregistrement de l'autoloader
	 */
	public function register()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}

	/**
	 * Inclut la classe appellée dynamiquement
	 *
	 * @param $class
	 */
	public function autoload($class)
	{
		require_once(__DIR__ . '/' . $class . '.php');
	}
}