<?php
namespace App\Models;

use \App\App;
use Core\Factories\DatabaseFactory;

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
    protected $_external_status = null;

    /**
     * Associe les champs propres aux formateurs à la classe personne
     */
    public function __construct()
    {
        parent::__construct(DatabaseFactory::db());

        $this->_fields = array_merge($this->_fields, [
            'further_informations'  =>  '',
            'study_levels_id'       =>  0,
            'hourly_rate'           =>  0,
            'trainer_extern'        =>  0,
            'active'                =>  1
        ]);
    }

    /**
     * Retourne le nom complet du formateur
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->getData('firstname') . ' ' . $this->getData('name');
    }

    /**
     * Retourne le niveau d'étude du formateur
     *
     * @return null
     */
    public function getStudyLevel()
    {
        if(!$this->_study_level)
        {
            $this->_study_level = model('studyLevel')->load($this->getData('study_levels_id'));
        }
        return $this->_study_level;
    }

    /**
     * Retourne tous les niveaux d'études
     *
     * @return null
     */
    public function getLevels()
    {
        if(!$this->_levels)
        {
            $this->_levels = collection('level')->where('trainer_id', '=', $this->getData('id'))->all();
        }
        return $this->_levels;
    }

    /**
     * Retourne tous les timesheets
     *
     * @return null
     */
    public function getTimesheets()
    {
        if(!$this->_timesheets)
        {
            $this->_timesheets = collection('timesheet')->where('trainer_id', '=', $this->getData('id'))->all();
        }
        return $this->_timesheets;
    }

    /**
     * Retourne toutes les matières
     *
     * @return null
     */
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

    /**
     * Retourne toutes les sessions des formations
     *
     * @return null
     */
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

    /**
     * Retourne le statut externe
     *
     * @return null|string
     */
    public function getExternalStatus()
    {
        if( !$this->_external_status )
        {
            if( $this->getData('trainer_exter') )
            {
                $this->_external_status = 'oui';
            }
            else
            {
                $this->_external_status = 'non';
            }
            return $this->_external_status;
        }
    }
}