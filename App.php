<?php 

include_once('Controllers/ControllerFactory.php');

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
		
		$monController = ControllerFactory:: createController();
		
		$monAction = App:: getInstance()->getAction($monController);
	}
	
	private function getAction($monController){
		
		//test si a est vide 		
		if(isset($_GET['a'])){
			
			$a = $_GET['a']."Action";
			
		}else{
			
			$a = 'indexAction';
			
		}
		
		//verification d'erreur dans le parametre $_GET (a)
		if(method_exists($monController, $a)){
			
			$monController->$a();
			
		}	
		
			
	}
	
	public static function getInstance(){
		
		//vérification si l'instance est setp
		if(!self::$_instance){
		
			self:: $_instance = new App();
		
		}
			
		return self:: $_instance;
		
	}
}








?>