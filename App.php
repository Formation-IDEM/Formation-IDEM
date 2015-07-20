<?php 



/**
 * class pour les patterns singleton
 */
class App  {
	
	//initialisation de l'instance a null
	private static $_instance = null;
	
	
	private function __construct() {
		
	}
	
	//methode de routage
	public function Run(){
			
		//test si c est vide 
		if(isset($_GET['c'])){
			
			$c = $_GET['c']."Controller";
			
		}else{
			
			$c = 'FrontController';
			
		}
		
		//test si a est vide 		
		if(isset($_GET['a'])){
			
			$a = $_GET['a']."Action";
			
		}else{
			
			$a = 'indexAction';
			
		}
		
		//verification d'erreur dans le parametre $_GET (c)
		if(!file_exists('Controllers/'.$c.'.php')){
			$c = 'FrontController'; 
			$a = 'erreurAction';
			
		}
		
		include_once ('Controllers/'.$c.'.php');
		$controller = new $c();
		
		//verification d'erreur dans le parametre $_GET (a)
		if(method_exists($controller, $a)){
			
			$controller->$a();
			
		} else {
			
			$controller->erreurAction();
			
		}
		

	}
	
	public static function getInstance(){
		
		//vérification si l'instance est set
		if(!self::$_instance){
		
			self:: $_instance = new App();
		
		}
			
		return self:: $_instance;
		
	}
}








?>