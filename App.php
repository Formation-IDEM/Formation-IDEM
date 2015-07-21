<?php  


class App{
	
	//on initialise l'instance à null
	private static $_instance = null;
	
	private function __contruct(){
		
		
	}	
	
	public static function getModel($type){
		
			
		if(file_exists("Models/".$type.".php")){
			
			include_once("Models/".$type.".php");
			
			return new $type();
			
		}else{
			
			return null;
		}
			
	}
	
	public function run(){
		
		include_once('Controllers/ControllerFactory.php');
			
			
		$controller = ControllerFactory::createController();
		
		//on donne à $a l'instance App qui a pour méthode getActionName	
		$a = self::getInstance() -> getActionName($controller);
			
		//on appelle la méthode sur le controleur
		$controller -> $a();	
		
	}	
		
	public function getActionName($controller){
		
		//on vérifie s'il y a une méthode (action) dans l'url
		if ( isset($_GET['a']) ){
			
			$a = $_GET['a'].'Action';
			
			//on vérifie si la méthode existe dans le controleur	
			if( !method_exists($controller, $a) ){
				
				//s'il y en a pas, action par defaut
				$a = "indexAction";
				
				return $a;
				
			}
			
			return $a;
		
		}else{
		
			//s'il n'y a pas d'action, action par defaut
			$a = "indexAction";
			
			return $a;
			
		}
		
	}	
	
	
	 public static function getInstance(){
	 	
		//on test s'il n'y a pas d'instance
		if (!self::$_instance){
			
			//on crée une nouvelle instance
			self::$_instance = new App();
			
		}
		
		//on retourne l'instance
		return self::$_instance;
		
	
	} 
	
	
}

