<?php  

class FormationController{
	
	public function __contruct(){
		
		
		
	}
	
	public function indexAction(){
		
		$maFormation = App::getModel("Formation");
		
		$maFormation -> load(4);
		
		//var_dump($maFormation);
		
	}
	
	public function noAction(){
		
		echo "Formation :aucune action exécutée";
		
	}
	
	public function editAction(){
		
		echo "Edit";
		
	}
	
	public function deleteAction(){
		
		echo "Delete";
		
	}
}
