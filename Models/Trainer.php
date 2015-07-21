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
		$this->_fields['further_informations']	= '';
		$this->_fields['study_levels_id']		= null;
		$this->_fields['id']					= null;
									
	}
	
	// Attributs
	protected $_furtherInformations;

	protected $_study_level_id;
	
	protected $_fields;
	
	protected $_table;
	
	protected $_id;
	
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
