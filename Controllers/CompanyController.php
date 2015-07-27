<?php

/**
 * 
 */
class CompanyController {
	
	function __construct() {
		
		
	}
	
	public function indexAction(){
		echo "Entreprises";
		Template::getInstance()->setDatas(array('test' => "testo"));
		Template::getInstance()->render();
	}
	
	public function editAction(){
		
		echo "Entreprises edit";
		
	}
}


?>