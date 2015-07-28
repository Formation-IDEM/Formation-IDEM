<?php

include_once('Person.php');

class Trainer extends Person
{
	
	// Attributs	
	protected $_table;
	
	protected $_fields;
		
	// Constructeur
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = 'trainers';
		$this->_fields['id'] = 0;
		$this->_fields['further_informations'] = '';
		$this->_fields['study_levels_id'] = 0;
	}
	
	public function getStudyLevels()
	{
		$sl = App::getModel('StudyLevel');
		$sl->load($this->getData('study_levels_id'));
		return $sl;
	}
}

?>