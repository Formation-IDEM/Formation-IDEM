<?php

include_once('Models/Model.php');

abstract class Person extends Model
{

	public function __construct()
	{
		$this->_fields['name'] = '';
		$this->_fields['firstname'] = '';
		$this->_fields['phone'] = '';
		$this->_fields['cellphone'] = '';
		$this->_fields['mail'] = '';
		$this->_fields['birthday'] = date('Y-m-d', time());
		$this->_fields['birthdayplace'] = '';
		$this->_fields['gender'] = '';
		$this->_fields['address_off_street'] = '';
		$this->_fields['address_off_complement'] = '';
		$this->_fields['address_off_codpost'] = '';
		$this->_fields['address_off_city'] = '';
		$this->_fields['address_form_street'] = '';
		$this->_fields['address_form_complement'] = '';
		$this->_fields['address_form_codpost'] = '';
		$this->_fields['address_form_city'] = '';
		$this->_fields['social_security_number'] = null;
		$this->_fields['photo'] = '';
		$this->_fields['nationality_id'] = 1;
		$this->_fields['family_status_id'] = 1;
	}
}

?>