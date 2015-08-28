<?php

include_once ('Model.php');

/**
 * Relation Satigiaire Entreprise
 */
class TraineeCompany extends Model {
	
	private $_attribute;
	private $_evaluation;
	private $_begin;
	private $_end;
	private $_job;
	
	function __construct() {
		
		parent::__construct();
		
	}
	
	public function getInternship(){
		
		$internship = App::getModel('Internship');
		$internship->load($this->getData('internship_id'));
		return $internship;
				
	}
	
	public function getCompany(){
		
		$company=App::getModel('Company');
		$company->load($this->getData('company_id'));
		return $company;
		
	}
	
}
