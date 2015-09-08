<?php
namespace App\Models;

use \App\App;
use Core\Model;

/**
 * Class Timesheet
 * @package App\Models
 */
class Timesheet extends Model
{
    protected $_trainer;
    protected $_formation_session;

    protected $_table = 'timesheets';

    protected $_fields = [
        'id'            =>  0,
        'month'         =>  0,
        'year'          =>  0,
        'total_hours'   =>  0,
        'trainer_id'    =>  0,
        'formation_session_id'  =>  0,
        'active'        =>  1
    ];

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