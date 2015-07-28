<?php

/**
 * 
 */
class CompanyController {
	
	function __construct() {
		
		
	}
	
	public function indexAction(){
		echo "Entreprises";
<<<<<<< HEAD
		Template::getInstance()->setDatas(array('test' => "testo"));
		Template::getInstance()->render();
=======
>>>>>>> cd98160eaca846585c6d0c3eb9c9c46e6c3f918c
	}
	
	public function editAction(){
		
		echo "Entreprises edit";
		
	}
}


?>