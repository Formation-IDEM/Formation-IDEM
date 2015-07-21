<?php

include_once('Person.php');

class Trainer extends Person
{
	// Constructeur
	public function __construct()
	{
		parent::__construct();
		$this->_furtherInformations = 'Vide';
		$this->_table = "trainers";
		$this->_fields = array 	(	
									'_furtherInformations'	=> 'further_informations',
									'_study_level_id'		=> 'study_level_id' 
								);
	}
	
	// Attributs
	private $_furtherInformations;

	private $_study_level_id;
	
	private $_fields;
	
	private $_table;
	
	private $_id;
	
	// Getters & Setters
	public function getFurtherInformations()
	{
		return $this->_furtherInformations;
	}
	
	public function setFurtherInformations($furtherInformations)
	{
		$this->_furtherInformations = $furtherInformations;
		return $this;
	}

	public function getStudyLevel()
	{
		$study_level = new StudyLevel();
		$study_level->load($this->_study_level_id);
		return $study_level;
	}

	public function setStudyLevel($study_level_id)
	{
		$this->_study_level_id = $study_level_id;
		return $this;
	}
}

?>
