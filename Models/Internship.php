<?php


include_once ('Model.php');

/**
 * Classe Stage
 */
class Internship extends Model {

	protected $_company = null;
	protected $_company_internship = null;
	protected $_table = 'internships';
    protected $_fields = [
        'id'            =>  0,
        'title'         =>  '',
        'explain'       =>  '',
        'company_id'    =>  0,
        'formation_id'  =>  0,
        'referent'      =>  '',
        'create_date'   =>  null,
        'update_date'   =>  null,
        'create_uid'    =>  0,
        'update_uid'    =>  0,
        'active'        =>  0,
        'pay'           =>  0,
        'wage'          =>  0
    ];

	function __construct() {

		parent::__construct();

	}

	public function getCompany(){

		if (!$this->_company) {
			$this->_company = App::getModel('Company')->load($this->getData('company_id'));
		}

		return $this->_company;
	}
	
	public function getCompanyInternship(){

		if (!$this->_company_internship) {
			$this->_company_internship = App::getCollection('CompanyInternship');
		}

		return $this->_company_internship;

	}
	
}
