<?php

include_once('Models/Model.php');

class StudyLevel extends Model
{
	
	// Attributs	
	protected $_table;
	
	protected $_fields;
			
	// Constructeur
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = 'study_levels';
		$this->_fields['id'] = 0;
		$this->_fields['wording'] = '';
	}
}

?>