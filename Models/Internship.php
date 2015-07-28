<?php

include_once ('model.php');

/**
 * Classe Stage
 */
class Internship extends Model {

	protected $_company = null;
	public $id;
	private $_internshipName;
	private $_descriptif;
	private $_companyId;
	private $_internshipLevel;
	private $_internshipTrainer;
	private $_availability;
	private $_validity;
	private $_pay; //remuneration bool
	private $_wage; //montant remuneration

	function __construct() {

		parent::__construct();

	}

	public function getCompany(){

		if (!$this->_company) {
			$this->_company=App::getModel('Company')->load($this->getData('company'));
		}

		return $this->_company;
	}


}