<?php

/**
 * 
 */
class CompanyController {

	function __construct() {


	}

	public function indexAction(){
		echo "Entreprises";
		Template::getInstance()->setTemplate('editcompany')->setDatas(array('test' => "testo"))->render();
	}

	public function editAction(){

		App::getInstance()->getModel('Company')->load($_GET['id']);
		var_dump(App::getInstance()->getModel('Company')->getFields());
		exit;
		
		//Database::getInstance()->getItems(1);
		Template::getInstance()->setTemplate('editcompany')->setDatas(['truc' => 'toto'])->render();

	}
}


?>