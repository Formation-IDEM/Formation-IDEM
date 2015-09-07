<?php
namespace App\Models;

/**
 * Class TrainerModel
 * @package App\Models
 */
class Trainer extends Person
{
    protected $_table = 'trainers';
    protected $_model = 'trainer';

    protected $_study_level = null;
    protected $_levels = null;
    protected $_timesheets = null;
    protected $_matters = null;
    protected $_trainer_extern = null;
    protected $_formation_sessions = null;

    public function __construct()
    {
        $this->_fields['id'] = 0;
		$this->_fields['further_informations'] = '';
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
            $this->_levels = collection('Level')->where('trainer_id', '=', $this->_fields['id'])->all();
        }
        return $this->_levels;
    }
    public function getTimesheets()
    {
        if(!$this->_timesheets)
        {
            $this->_timesheets = collection('Timesheet')->where('trainer_id', '=', $this->_fields['id'])->all();
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