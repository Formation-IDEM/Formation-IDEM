<?php  

class FrontController{
	
	public function __contruct(){
		
	}
	
	public function indexAction(){
		
		//Template::getInstance()->setDatas(array("test"=>"pwet"));
		//Template::getInstance()->render();		
		
		$f = App::getModel('Formation');
		
		$c = App::getCollection("RefPedago");
		
		$f -> setRefPedago($c -> getItems("formations",1));
		
		var_dump( $f -> getRefPedago() );
				
	}
	
	public function noAction(){
		
		echo "Accueil :aucune action exécutée";
		
	}
}

?>