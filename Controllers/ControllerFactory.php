
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
	

		

}

?>
