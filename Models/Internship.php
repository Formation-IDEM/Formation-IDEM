<?php


include_once ('Model.php');

/**
 * Classe Stage
 */
class Internship extends Model {

	protected $_company = null;
	protected $_company_internship = null;
	protected $_formation = null;
	protected $_table = 'internships';
    protected $_fields = [
        'id'            =>  0,
        'title'         =>  '',
        'explain'       =>  '',
        'company_id'    =>  '',
        'formation_id'  =>  '',
        'referent'   	=>  '',
        'create_uid'	=>	1,
        'update_uid'	=>	1,
        'active'        =>  1,
        'pay'           =>  0,
        'wage'          =>  ''
    ];

	function __construct() {

		parent::__construct();
		//$this->_fields['create_date'] = strtotime(date('d/m/Y'));
		$this->setData('update_date', date('d/m/Y'));
	}

	public function getCompany(){

		if (!$this->_company) {
			$this->_company = App::getModel('Company')->load($this->getData('company_id'));
		}

		return $this->_company;
	}
	
	public function getFormation(){

		if (!$this->_formation) {
			$this->_formation = App::getModel('Formation')->load($this->getData('formation_id'));
		}

		return $this->_formation;
	}
	
	public function getCompanyInternship(){

		if (!$this->_company_internship) {
			$this->_company_internship = App::getCollection('CompanyInternship');
		}

		return $this->_company_internship;

	}
	
}
