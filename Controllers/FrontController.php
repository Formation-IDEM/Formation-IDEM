<?php

/**
 * 
 */
class FrontController {
	
	function __construct() {
		
		
	}
	
	public function indexAction(){
		$maCompany = App::getModel('Company');
		$maCompany->store(array('name' => 'IDEM',
								'status' => 'ecole',
								'company_name' => 'escuela',
								'address' => 'chateaubriand',
								'postal_code' => '66666',
								'city' => 'Soler',
								'country' => 'France',
								'phone' => '0125452',
								'mobile' => '0154542',
								'fax' => '046846',
								'manager' => 'Toi'
		));
		var_dump($maCompany->save());
		//$maCompany->load(1);
		//$maCompany->delete(1);
	}
	
	public function editAction(){
		
		echo "Accueil edit";
		
	}

	
}


?>