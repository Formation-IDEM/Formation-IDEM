<?php

include_once('Models/Model.php');

abstract class Person extends Model
{

	public function __construct()
	{
		$this->_fields['name'] = 'anonyme';
		$this->_fields['firstname'] = '0';
		$this->_fields['phone'] = '0';
		$this->_fields['cellphone'] = '0';
		$this->_fields['mail'] = '0';
		$this->_fields['birthday'] = '0001-01-01';
		$this->_fields['birthdayplace'] = '0';
		$this->_fields['gender'] = '0';
		$this->_fields['address_off_street'] = '0';
		$this->_fields['address_off_complement'] = '0';
		$this->_fields['address_off_codpost'] = '0';
		$this->_fields['address_off_city'] = '0';
		$this->_fields['address_form_street'] = '0';
		$this->_fields['address_form_complement'] = '0';
		$this->_fields['address_form_codpost'] = '0';
		$this->_fields['address_form_city'] = '0';
		$this->_fields['social_security_number'] = 1111111;
		$this->_fields['photo'] = 'aucune';
		$this->_fields['nationality_id'] = 1;
		$this->_fields['family_status_id'] = 1;
	}
}

?>