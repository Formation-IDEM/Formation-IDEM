<?php  

class FrontController{
	
	public function __contruct(){
		
	}
	
	public function indexAction(){
		
        Template::getInstance()->setFilename('Front/index')->render();
		
	}	
	
}

?>