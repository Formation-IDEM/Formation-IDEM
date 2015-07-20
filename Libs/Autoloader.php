<?php

/**
 * Autoloader.php
 */
class Autoloader
{
	public static function register()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}

	public static function autoload($class)
	{
		$class = ucfirst($class);
		if( is_file(ROOT . 'Libs/' . $class . '.php') )
		{
			require_once( ROOT . 'Libs/' . $class . '.php');
		}
		else if( is_file(ROOT . 'Controllers/' . $class . '.php') )
		{
			require_once( ROOT . 'Controllers/' . $class . '.php');
		}
		else if( is_file(ROOT . 'Models/' . $class . '.php') )
		{
			require_once( ROOT . 'Models/' . $class . '.php');
		}
		else if( is_file(ROOT . 'Exceptions/' . $class . '.php') )
		{
			require_once( ROOT . 'Exceptions/' . $class . '.php');
		}
	}
}