<?php

class NationalityController {

    function indexAction() {
		// indexAction - FrontController
		$nat = app::getModel("Nationality");
		$nat->store(array('title' => 'Japon'));
		
		$nat->save();
		echo $nat->getData('id');	
		
	}
}

?>