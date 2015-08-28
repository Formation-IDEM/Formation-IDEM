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
								'create_uid' => 0
	);


	public function __construct() {

		parent::__construct();

	}

	/*public function getInternship() {

		App::getModel('Internship')->load($this->getData('id'));
		return $internship;
		getItems($this->getData('id'));
	}*/
}