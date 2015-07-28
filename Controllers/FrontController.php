<?php  


class FrontController{
	
	public function __contruct(){
		
	}
	
	public function indexAction(){
		
		//Template::getInstance()->setDatas(array("test"=>"pwet"));
		//Template::getInstance()->render();		
		
		$f = App::getModel("Matter");
		
		$f -> store(array('title'=>'pouf'));
		
		$f -> save();
		
		var_dump($f);
		
	}
	
	public function noAction(){
		
		echo "Accueil :aucune action exécutée";
		
	}
}
