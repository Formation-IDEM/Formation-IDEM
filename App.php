<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en privé
    class App {
    	
    	private static $_instance;
		
    	private function __construct() {
    		
    	}
		
		public static function getInstance() {
			if (!self::$_instance){
				self::$_instance = new App();
			}
			return self::$_instance;
		}
		
		public function run() {

// On appelle le factory controller directement avec la classe car elle est statique
	
			include_once ('Controllers/ControllerFactory.php');

// On controle le nom de l'action
			
			$actionName = self::getInstance() -> getActionName();  
			
 // on stocke l'instance du controleur
 
			$mc = ControllerFactory::createController();
			
		
// on execute l'action sur le controleur  
			if (!method_exists($mc, $actionName)) {
				
				$actionName = "indexAction";
			}
			
			$mc -> $actionName();
		
		}

		private function getActionName() {
			
			if (isset($_GET['a'])) {
				$a = $_GET['a'];
			}else {
				$a = "indexAction"; // Initialisation par defaut
			}		
			
			return $a;
		
		}
			
			

    }
?>