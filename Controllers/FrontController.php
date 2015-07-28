<?php  


class FrontController{
	
	public function __contruct(){
		
	}
	
	public function indexAction(){
		
		Template::getInstance()->setDatas(array("test"=>"pwet"));
		Template::getInstance()->render();
		
	}
	
	public function noAction(){
		
		echo "Accueil :aucune action exécutée";
		
	}
}
