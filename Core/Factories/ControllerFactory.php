<?php
/**
 * ControllerFactory.php
 */
namespace Core\Factories;

use \App\Exceptions\RouterException;

class ControllerFactory
{
	/**
	 * @param $controller
	 * @return mixed
	 * @throws \App\Exceptions\RouterException
	 */
	public static function createController($controller)
	{
		$control = "App\\Controllers\\" . $controller . "Controller";

		//	On vérifie que le controller existe
		if( !class_exists($control) )
		{
			throw new RouterException('Le controlleur ' . $control . ' n\'existe pas.');
		}
		return new $control();
	}
}