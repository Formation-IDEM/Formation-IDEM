<?php

include_once('Person.php');

class Trainer extends Person{
	
	// Constructeur
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = "trainers";
		$this->_fields['further_informations']	= '';
		$this->_fields['study_levels_id']		= 0;
		$this->_fields['id']					= 0;
									
	}
	
	// Attributs

	
	protected $_fields;
	
	protected $_table;
	
}

?>
