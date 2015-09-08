<?php

include_once('Person.php');

class Trainer extends Person
{
	
	// Attributs
	
	protected $_study_level = null;

	protected $_levels = null;

	protected $_participations = null;

	protected $_matters = null;

	protected $_trainer_extern = null;
	
	protected $_formation_sessions = null;
		
	// Constructeur
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = 'trainers';
		$this->_fields['id'] = 0;
		$this->_fields['further_informations'] = 'lol';
		$this->_fields['study_levels_id'] = 1;
		$this->_fields['hourly_rate'] = 1;
		$this->_fields['trainer_extern'] = false;
		$this->_fields['active'] = 1;
	}

	public function getFullName()
	{
		return $this->getData('firstname').' '.$this->getData('name');
	}
	
	public function getStudyLevel()
	{
		if(!$this->_study_level)
		{
			$this->_study_level = App::getModel('StudyLevel')->load($this->getData('study_levels_id'));
		}
		return $this->_study_level;
	}
	
	public function getLevels()
	{
		if(!$this->_levels)
		{
			$this->_levels = App::getCollection('Level')->getFilteredItems('trainer_id', $this->_fields['id']);
		}
		return $this->_levels;
	}

	public function getParticipations()
	{

		if(!$this->_participations)
		{
			$this->_participations = App::getCollection('Participation')->getFilteredItems('trainer_id', $this->_fields['id']);
		}

		return $this->_participations;

	}

	public function getMatters()
	{
		if(!$this->_matters)
		{
			$levels = $this->getLevels();
			foreach($levels as $level)
			{
				 $this->_matters[] = $level->getMatter();
			}
		}
		return $this->_matters;
	}

	public function getFormationSessions()
	{
		if(!$this->_formation_sessions)
		{
			$participations = $this->getParticipations();
			foreach($participations as $participation)
			{
				 $this->_formation_sessions[] = $participation->getFormationSession();
			}
		}
		return $this->_formation_sessions;
	}
}

?>