<?php


class FrontController {


	/*
	 * 
	 */
	function indexAction() {
		// indexAction - FrontController
		echo "indexAction - FrontController";
		
		$fs = App::getModel('FamilyStatus');
		
		$fs->store(array( 'title' => 'celibataire'));
		
		var_dump( $fs->save() );
	}


}

?>