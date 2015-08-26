<?php  

class FormationController{
	
	public function __contruct(){
	}
	
	public function indexAction(){
		
		Template::getInstance()->setFileName("Formation/list_formations");
		
		Template::getInstance()->render();
		
	}
	
	public function editAction(){
		
		Template::getInstance()->setFileName("Formation/edit_formations");
		
		Template::getInstance()->render();
		
	}
	
	public function deleteAction(){
		
		$maFormation = App::getModel("Formation");
		
		if( isset($_POST['delete']) ){
		
			$maFormation->load($_POST['id']);
			$maFormation->delete();
			header("Location: index.php?c=Formation");
			
		}
		
	}

}
