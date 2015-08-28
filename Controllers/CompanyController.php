<?php

class CompanyController {

	function __construct() {


	}

	public function indexAction(){
		echo "Entreprises";
		App::getModel('TraineeCompany')->load($_GET['id'])->getInternship();
		
		Template::getInstance()->setFileName('editcompany')->render();
	}

	public function editAction(){

		App::getInstance()->getModel('Company')->load($_GET['id']);
		
		
		//var_dump(App::getInstance()->getModel('Company')->getFields());
		
		//Database::getInstance()->getItems(1);
		Template::getInstance()->setTemplate('editcompany')->render();

	}
}


?>