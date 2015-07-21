<<<<<<< HEAD
<?php 


/**
 * class pour les patterns Factory
 */
class ControllerFactory{
	
	
	private function __construct() {
		
	}
	
	public static function createController(){
		
		//test si c est vide 
		if(isset($_GET['c'])){
			
			$c = $_GET['c']."Controller";
			
		}else{
			
			$c = 'FrontController';
			
		}
	
		//verification d'erreur dans le parametre $_GET (c)
		if(!file_exists('Controllers/'.$c.'.php')){
			$c = 'FrontController'; 
			
		}
		
		include_once ('Controllers/'.$c.'.php');
		return $controller = new $c();
		
		
	}	
	

		
=======
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
>>>>>>> 459d5f36845054875cd6af5310157fd8db4d92e7
}

?>