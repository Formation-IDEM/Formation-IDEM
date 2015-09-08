<?php

/**
 * Class TraineeModel
 * @package App\Models
 */
class Trainee extends Person
{
    protected $_table = 'trainees';
    protected $_fields = [
        'remuneration_type_id'  =>  0,
        'status_trainee_id'     =>  0,
        'study_levels_id'       =>  0,
        'family_status_id'      =>  0,
        'nationality_id'        =>  0
    ];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Charge la rémunération
     *
     * @return mixed
     */
    public function getRemuneration()
    {
        $remunerationType = ModelFactory::loadModel('remunerationType');
        $remunerationType->load($this->_fields['remuneration_type_id']);
        return $remunerationType;
    }

    /**
     * Charge le status
     *
     * @return mixed
     */
    public function getTraineeStatus()
    {
        $traineeStatus = ModelFactory::loadModel('traineeStatus');
        $traineeStatus->load($this->_fields['status_trainee_id']);
        return $traineeStatus;
    }

    /**
     * Charge le niveau d'étude
     *
     * @return mixed
     */
    public function getStudyLevel()
    {
        $StudyLevel = ModelFactory::loadModel('StudyLevel');
        $StudyLevel->load($this->_fields['Study_levels_id']);
        return $StudyLevel;
    }

    /**
     * Charge le status familial
     *
     * @return mixed
     */
    public function getFamilyStatus()
    {
        $familyStatus = ModelFactory::loadModel('familyStatus');
        $familyStatus->load($this->_fields['family_status_id']);
        return $familyStatus;
    }

    /**
     * Charge la nationalité
     *
     * @return mixed
     */
    public function getNationality()
    {
        $nationality = ModelFactory::loadModel('nationality');
        $nationality->load($this->_fields['nationality_id']);
        return $nationality;
    }
}