<?php

include_once ('Model.php');

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
        'active'				=>	TRUE,
    ];
	
	
	/*public function getInternship() {

		App::getModel('Internship')->load($this->getData('id'));
		return $internship;
		getItems($this->getData('id'));
	}*/
	
}