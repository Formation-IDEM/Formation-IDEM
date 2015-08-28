<<<<<<< HEAD
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
=======
<?php

/**
 * Class Company
 */
class Company extends Model
{
    protected $_table = 'companies';
    protected $_fields = [
        'id'					=>	0,
        'name'					=>	'',
        'status'				=>	'',
        'email'					=>	'',
        'address'				=>	'',
        'postal_code'			=>	'',
        'city'					=>	'',
        'country'				=>	'',
        'phone'					=>	'',
        'mobile'				=>	'',
        'fax'					=>	'',
        'manager'				=>	'',
        'create_date'			=>	'',
        'update_date'			=>	'',
        'create_uid'			=>	0,
        'update_uid'			=>	0,
        'visit_date'			=>	null,
        'active'				=>	0,
    ];
}
>>>>>>> entreprises
