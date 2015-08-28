<?php

/**
 * Class ControllerFactory
 */
class ControllerFactory 
{
	/**
	 * Charge un controller
	 *
	 * @return mixed
	 */
	public static function createController()
	{
		$controller = 'FrontController';
		
		if( isset( $_GET['c'] ) )
		{
			if( file_exists( dirname(dirname(__FILE__)) . '/Controllers/' . ucfirst(htmlspecialchars($_GET['c'])) . 'Controller.php' ) ) {
				$controller = htmlspecialchars(ucfirst($_GET['c'])) . 'Controller';
			}
		}
		include_once ( dirname(dirname(__FILE__)) . '/Controllers/' . ucfirst($controller) . '.php');
		return new $controller();
	}


}

?>