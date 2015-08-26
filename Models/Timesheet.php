<?php

class Timesheet extends Model
{
	protected $_trainer;

	protected $_formation_session;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'timesheets';

		$this->_fields['id'] = 0;
		$this->_fields['month'] = 0;
		$this->_fields['year'] = 0;
		$this->_fields['total_hours'] = 0;
		$this->_fields['trainer_id'] = 0;
		$this->_fields['formation_session_id'] = 0;
	}

	public function getTrainer()
	{
		if(!$this->_trainer)
		{
			$this->_trainer = App::getModel('Trainer')->load($this->getData('trainer_id'));
		}
		return $this->_trainer;
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