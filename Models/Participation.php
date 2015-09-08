<?php

class Participation extends Model
{
	protected $_trainer;

	protected $_formation_session;

	protected $_interventionsheets;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'participations';

		$this->_fields['id'] = 0;
		$this->_fields['date_start'] = date('Y-m-d', time());
		$this->_fields['date_end'] = date('Y-m-d', time());
		$this->_fields['total_hours'] = 0;
		$this->_fields['trainer_id'] = 0;
		$this->_fields['formation_session_id'] = 0;
		$this->_fields['active'] = 1;
	}

	public function getTrainer()
	{
		if(!$this->_trainer)
		{
			$this->_trainer = App::getModel('Trainer')->load($this->getData('trainer_id'));
		}
		return $this->_trainer;
	}

	public function getInterventionsheets()
	{
		if(!$this->_interventionsheets)
		{
			$this->_interventionsheets = App::getCollection('Interventionsheet')->getFilteredItems('participation_id', $this->_fields['id']);
		}
		return $this->_interventionsheets;
	}
	
	public function getFormationSession()
	{
		if(!$this->_formation_session)
		{
			$this->_formation_session = App::getModel('FormationSession')->load($this->getData('formation_session_id'));
		}
		return $this->_formation_session;
	}

}

?>