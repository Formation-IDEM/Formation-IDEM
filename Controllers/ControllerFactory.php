<?php

	/**
	 * Controller Factory
	 */
	class ControllerFactory {
		
		static function createController() {
			
			//Verification du premier paramètre dans l'URL
			if (isset($_GET['c'])) {
				
				$c = $_GET['c'].'Controller';
			}
			
			else{
				
				$c = 'FrontController';
			}
			
			//Verif si le fichier existe bien
			if (!file_exists('Controllers/'.$c.'.php')) {
	    		$c = 'FrontController';
			}
			
			//Inclusion du controller et classe instanciée			
			include_once ('Controllers/'.$c.'.php');
			return $controller = new $c();
			
			
		
		}
	}
	

?>