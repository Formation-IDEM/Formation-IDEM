<?php  

class ControllerFactory{
	
	public static function __contruct(){
		
		
		
	}
	
	public static function createController(){
		
	//ControllerFactory::createController();
	
	if( isset($_GET['c']) ) {
			
			//si c est present on l'initialise
			$c = $_GET['c'].'Controller';
			
			//on vérifie si le controlleur du parametre existe
			if(!file_exists('Controllers/'.$c.'.php')){
				
				//s'il existe pas on l'initialise à defaut
				$c = "FrontController";
					
			}
			
			
		//s'il n'y pas de parametre ['c']
		}else{
			
			$c = "FrontController";
			
		}
		
		//on inclut le fichier du controleur
		include_once('Controllers/'.$c.'.php');
		
		//on instancie l'objet du controleur
		$controller = new $c();
		
		return $controller;
	}
	

}