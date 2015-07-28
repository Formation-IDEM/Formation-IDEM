<?php

class ControllerFactory
{
	public static function createController()
	{
		$controller = 'FrontController';
		if(isset($_GET['c']))
		{
			if(file_exists('./Controllers/'.$_GET['c'].'Controller.php'))
			{
				$controller = $_GET['c'].'Controller';
			}
		}
		include_once('./Controllers/'.$controller.'.php');
		return new $controller();			
	}
}

?>