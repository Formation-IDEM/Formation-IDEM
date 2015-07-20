<?php
    class ControllerFactory {

    	public function __construct() {
    		
    	}
		
		public static function createController() {
			
			if (isset($_GET['c'])) {
				$c = $_GET['c']."Controller";
			}else {
				$c = "FrontController"; // Initialisation par defaut
			}
			
			
			if (!file_exists(dirname(__FILE__) . "/" . $c . ".php")){
				$c = "FrontController";
			}
			
			include_once (dirname(__FILE__) . "/" . $c . ".php");
			
			$controller = new $c();
			
			return $controller;
		}
    }
?>