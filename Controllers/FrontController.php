<?php

/**
 * Ma class Front controller
 */
class FrontController{
	
	public function __construct() {
		
		
	}
	
	public function indexAction(){
		
		$monFormateur = App::getModel('Trainer');
		$monFormateur->load(1);
		$monFormateur->delete();
		
	}
	
	public function erreurAction(){
		
		echo "adresse introuvable ou erreur dans l'adresse";
		
	}
	
	
}

 
?>

