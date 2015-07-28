<?php

include_once('Model.php');

abstract class Person extends Model
{
	public function __construct(){
		$this->_fields['name'] = '';
		$this->_fields['firstName'] = '';
		$this->_fields['phone'] = 0;
		$this->_fields['cellphone'] = 0;
		$this->_fields['mail'] = '';
		$this->_fields['birthday'] = 0;
		$this->_fields['birthPlace'] = '';
		$this->_fields['gender'] = '';
		$this->_fields['address_off_street'] = '';
		$this->_fields['address_off_complement'] = '';
		$this->_fields['address_off_codpost'] = 0;
		$this->_fields['address_off_city'] = '';
		$this->_fields['address_form_street'] = '';
		$this->_fields['address_form_complement'] = '';
		$this->_fields['address_form_complement'] = 0;
		$this->_fields['address_form_complement'] = '';
		$this->_fields['social_security_number'] = 0;
		$this->_fields['photo'] = '';
		$this->_fields['nationality_id'] = 0;
		$this->_fields['family_status_id'] = 0;
	}
}

?>