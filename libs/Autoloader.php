<?php

/**
 * Autoloader.php
 */
class Autoloader
{
	/**
	 * Enregistrement de l'autoloader
	 */
	public static function register()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}

	/**
	 * Inclut la classe appellée dynamiquement
	 *
	 * @param $class
	 */
	public static function autoload($class)
	{
		if( is_file(__DIR__ . '/' . $class . '.php') )
		{
			require_once(__DIR__ . '/' . $class . '.php');
		}
		else
		{
			require_once('./Models/' . $class . '.php');
		}
	}
}