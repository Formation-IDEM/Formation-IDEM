<?php  

class FormationController{
	
	public function __contruct(){
		
		
		
	}
	
	public function indexAction(){
		
		$maFormation = App::getModel("Formation");
		
		$maFormation -> save();
		$fs->store(array( 'title' => 'Cap Metiers'));
	
		
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
