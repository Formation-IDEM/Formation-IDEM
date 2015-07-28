<?php

/**
 * 
 */
class FrontController {
	
	function __construct() {
		
		
	}
	
	public function indexAction(){
		$maCompany = App::getModel('Company');
		/*$maCompany->store(array('name' => 'Azaa',
								'status' => 'AFf',
								'company_name' => 'Vfsil',
								'address' => 'SafF',
								'postal_code' => '22222',
								'city' => 'ARGN',
								'country' => 'France',
								'phone' => '012454552',
								'mobile' => '015545462',
								'fax' => '04684678',
								'manager' => 'ELLE'
		));
		var_dump($maCompany->save());*/
		//$maCompany->load(1);
		//$maCompany->delete(1);
	}
	
	public function editAction(){
		
		echo "Accueil edit";
		
	}

	
}


?>