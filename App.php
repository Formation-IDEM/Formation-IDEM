<?php

class app{
	
	private static $_instance = null;
	
	private function __construct(){
		
	}
	
	// Static pour être appelé avec App::getInstance();
	public static function getInstance(){

		//Vérifie s'il n'y a pas d'instance
		if(!self::$_instance){
			self::$_instance = new App();
		}
		return self::$_instance;
	}
	
	public function getActionName(){			
		
		//Vérifie la présence de ?a=			
		if(!isset($_GET['a'])){
			return "indexAction";
		}else{
			$action = $_GET['a']."Action";
			$TrainerController = "TrainerController";
			
			if(method_exists($TrainerController, $action)){
				return $action;
			}
			//En cas erreur sur ?a=
			else{
				return "errorAAction";
			}
		}
	}
	
	public function run(){
		
		include_once('Models/Template.php');
		include_once('Controllers/ControllerFactory.php');
		$Fcontroller = ControllerFactory::createController();
		//$actionName = self::getActionName();
		$actionName = App::getInstance()->getActionName($Fcontroller);
		
		$Fcontroller->$actionName();
	}
	
	public static function getModel($type){
		if(file_exists('Models/'.$type.'.php')){
			include_once('Models/'.$type.'.php');
			return new $type();
		}else{
			return null;
		}
	}
	
}

?>