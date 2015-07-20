<?php

/**
 * 
 */
class App {
	
	private static $_instance = null;
	
	private function __construct(){
			
		
			
	}
	
	public function run()
	{
		include_once ('Controllers/ControllerFactory.php');
		$createController = ControllerFactory::createController();
		$action = App::getInstance()->getAction($createController);
	}
	
	public function getAction($createController){
		//Verif du 2eme parmaètre
			
			if (isset($_GET['a'])) {
				
				$a = $_GET['a'].'Action';
			}else{
				
				$a = 'indexAction';
			}
			
			//Verif l'existence de la method
			if (!method_exists($createController, $a)) {
				$a = 'indexAction';
			}
			
			//Appel de la method
			$createController->$a();
	}
	
	public static function getInstance(){
		if (!self::$_instance) {
				
			self::$_instance = new App();
		
		}
		
		return self::$_instance;
		
	}
	
	
	
}

?>
