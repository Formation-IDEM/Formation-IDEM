<?php

include_once ('Model.php');

/**
 * Relation Satigiaire Entreprise
 */
class CompanyInternship extends Model {

	protected $_table = 'company_internship';
    protected $_fields = [
        'trainee_id'        =>  0,
        'company_id'        =>  0,
        'internship_id'     =>  0,
        'date_begin'    	=> 	'0000-00-00 00:00:00',
        'date_end'  		=>  '0000-00-00 00:00:00'
    ];
	
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	public function getInternship(){
		
		$internship = App::getModel('Internship');
		$internship->load($this->getData('internship_id'));
		return $internship;
				
	}
	
	public function getCompany(){
		
		$company = App::getModel('Company');
		$company->load($this->getData('company_id'));
		return $company;
		
	}
	
}
