<?php 

include_once ('model.php');

/**
 * Classe entreprise
 */
class Company extends Model {
	
	public $id;
	private $_name;
	private $_status;
	private $_address;
	private $_postalCode;
	private $_city;
	private $_country;
	private $_fax;
	private $_phone;
	private $_email;
	private $_companyName; //Raison Sociale
	private $_manager;
	private $_visitDate;
	private $_siret;
	
	public function __construct() {
		
		parent::__construct();
		
	}
	
}






