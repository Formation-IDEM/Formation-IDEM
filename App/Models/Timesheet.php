<?php
namespace App\Models;

use Core\Model;

/**
 * Class Timesheet
 * @package App\Models
 */
class Timesheet extends Model
{
    protected $_fields = [
        'id'            =>  0,
        'month'         =>  0,
        'year'          =>  0,
        'total_hours'   =>  0,
        'trainer_id'    =>  0,
        'formation_session_id'  =>  0
    ];

    /**
     * Récupère le formateur
     *
     * @return mixed
     */
    public function getTrainer()
    {
        $trainer = ModelFactory::loadModel('trainer');
        $trainer->load($this->_fields['trainer_id']);
        return $trainer;
    }

    /**
     * Récupère la session de formation
     * @return mixed
     */
    public function getFormationSession()
    {
        $formationSession = ModelFactory::loadModel('formationSession');
        $formationSession->load($this->_fields['formation_session_id']);
        return $formationSession;
    }
}