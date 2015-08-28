<?php

class CompanyController {

	function __construct() {


	}

	public function indexAction(){
		echo "Entreprises";
		
		App::getInstance()->getModel('TraineeCompany')->load($_GET['id'])->getInternship();
		
		Template::getInstance()->setTemplate('editcompany')->setDatas(array('test' => "testo"))->render();
	}

	public function editAction(){

		App::getInstance()->getModel('Company')->load($_GET['id']);
		
		
		//var_dump(App::getInstance()->getModel('Company')->getFields());
		
		//Database::getInstance()->getItems(1);
		Template::getInstance()->setTemplate('editcompany')->setDatas(['truc' => 'toto'])->render();

	}
}


?>