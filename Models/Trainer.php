<?php

include_once('Person.php');

class Trainer extends Person
{
	
	// Attributs
	
	protected $_study_level = null;

	protected $_levels = null;

	protected $_timesheets = null;

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
	}

	public function getTrainerExtern()
	{
		if(!$this->_trainer_extern)
		{
			$this->_trainer_extern = App::getCollection('TrainerExtern')->getItem($this->_fields['id']);
		}
		return $this->_trainer_extern;
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
			$this->_levels = App::getCollection('Level')->getItems($this->_fields['id']);
		}
		return $this->_levels;
	}

	public function getTimesheets()
	{

		if(!$this->_timesheets)
		{
			$this->_timesheets = App::getCollection('Timesheet')->getItems($this->_fields['id']);
		}

		return $this->_timesheets;

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
			$timesheets = $this->getTimesheets();
			foreach($timesheets as $timesheet)
			{
				 $this->_formation_sessions[] = $timesheet->getFormationSession();
			}
		}
		return $this->_formation_sessions;
	}
}

?>