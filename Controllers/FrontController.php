<?php

class FrontController {

	function __construct() {


	}

	public function indexAction(){
		$maCompany = App::getModel('Company');
		$testControl = "Salut toi";
		Template::getInstance()->setDatas(array('test' => $testControl))->setTemplate('index')->render();

	}

	public function editAction(){

		echo "Accueil edit";

	}


}


?>