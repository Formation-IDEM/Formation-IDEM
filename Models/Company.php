<?php 

include_once ('Model.php');

/**
 * Classe entreprise
 */
class Company extends Model {

	protected $_table='companies';
	protected $_fields = array('id' => 0,
								'name' => '',
								'status' => '',
								'company_name' => '',
								'address' => '',
								'postal_code' => '',
								'city' => '',
								'country' => '',
								'phone' => '',
								'mobile' => '',
								'fax' => '',
								'manager' => '',
								
	);
	
	
	public function __construct() {
		
		parent::__construct();
		
	}
}






