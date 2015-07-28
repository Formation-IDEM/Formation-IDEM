<?php

include_once('Person.php');

class Trainer extends Person
{	
	// Constructeur
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = "trainers";
		$this->_fields = array_merge(
		$this->_fields,
			array(
				'furtherInformations' => '',
				'study_level_id' => 0,
				'id' => 0
			)
		);
	}
}

?>
