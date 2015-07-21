<?php

/**
 * Ma class Front controller
 */
class FrontController{
	
	public function __construct() {
		
		
	}
	
	public function indexAction(){
		
		$monFormateur = App::getModel('Trainer');
		$monFormateur->load(4);
		var_dump($monFormateur);
		
		
		echo "index";
		
	}
	
	public function erreurAction(){
		
		echo "adresse introuvable ou erreur dans l'adresse";
		
	}
	
	
}

 
?>

