<?php  


class FrontController{
	
	public function __contruct(){
		
	}
	
	public function indexAction(){
		
		//Template::getInstance()->setDatas(array("test"=>"pwet"));
		//Template::getInstance()->render();		
		
		//$f = App::getModel("Matter");
		//$f -> store(array('title'=>'pouf'));
		
		
	}
	
	public function noAction(){
		
		echo "Accueil :aucune action exécutée";
		
	}
}
