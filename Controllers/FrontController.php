<?php

/**
 * 
 */
class FrontController {
	
	function __construct() {
		
		
	}
	
	public function indexAction(){
<<<<<<< HEAD
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
=======
		echo "Accueil";
>>>>>>> cd98160eaca846585c6d0c3eb9c9c46e6c3f918c
	}
	
	public function editAction(){
		
		echo "Accueil edit";
		
	}
<<<<<<< HEAD

	
=======
>>>>>>> cd98160eaca846585c6d0c3eb9c9c46e6c3f918c
}


?>