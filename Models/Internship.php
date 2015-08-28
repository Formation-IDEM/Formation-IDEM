<?php

include_once ('Model.php');

/**
 * Classe Stage
 */
class Internship extends Model {

	protected $_company = null;

	function __construct() {

		parent::__construct();

	}

/*	public function getCompany(){

		if (!$this->_company) {
			$this->_company=App::getModel('Company')->load($this->getData('company_id'));
		}

		return $this->_company;
	}*/

}