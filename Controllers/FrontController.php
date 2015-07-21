<?php

class FrontController{
	
	public function __construct(){
		
	}
	
	public function indexAction(){
		echo "Accueil général";
	}
	
	public function bidon(){
		echo "Bidon";
	}
	
	public function errorCAction(){
		echo "An error as occured! CONTROLLER NAME";
	}
	
}

?>