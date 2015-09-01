<?php

/**
 * Class ControllerFactory
 */
class ControllerFactory 
{
	/**
	 * Permet de charger le controller avec les paramètres passés en URL
	 *
	 * @return mixed
	 */
	public static function createController()
	{
		$controller = 'FrontController';
		if( isset( $_GET['c'] ) )
		{
			if( file_exists( dirname(dirname(__FILE__)) . '/Controllers/' . ucfirst($_GET['c']) . 'Controller.php' ) )
			{
				$controller = ucfirst($_GET['c']) . 'Controller';
			}
		}
		include_once( dirname(dirname(__FILE__)) . '/Controllers/' . $controller . '.php' );
		return new $controller();
	}


}