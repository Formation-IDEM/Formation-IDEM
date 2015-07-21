<?php

class ControllerFactory{
	
	public function __construct(){
		
	}
	
	public static function createController(){
		
		if(!isset($_GET['c'])){
			include_once('FrontController.php');
			
			$controller = new FrontController();
			
			//renvoie le controller général
			return $controller;
			
		}else{
			$c = $_GET['c']."Controller";
			
			$url = "Controllers/".$c.".php";
			
			//Vérifie l'existence du fichier 
			if(file_exists($url)){
					
				//inclut fichier du controller
				include_once($url);
				
				$controller = new $c();
			}else{
				include_once('FrontController.php');
				
				$controller = new FrontController();
				
				return $controller;
			}
			
			//renvoie le controller passé par l'URL
			return $controller;
		}
	}
}

?>