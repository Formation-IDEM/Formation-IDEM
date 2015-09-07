<?php
namespace App\Models;

/**
 * Class TraineeModel
 * @package App\Models
 */
class Trainee extends Person
{
    protected $_fields = [
        'id'                    =>  0,
        'name'                  =>  '',
        'firstname'             =>  '',
        'birthday'              =>  '',
        'birthdayplace'         =>  '',
        'gender'                =>  '',
        'adress_off_street'     =>  '',
        'adress_off_complement' =>  '',
        'adress_off_codpost'    =>  '',
        'adress_off_city'       =>  '',
        'adress_form_street'    =>  '',
        'adress_form_complement' =>  '',
        'adress_form_codpost'   =>  '',
        'adress_form_city'      =>  '',
        'phone'                 =>  '',
        'mail'                  =>  '',
        'cellphone'             =>  '',
        'photo'                 =>  '',
        'remuneration_type_id'  =>  0,
        'status_trainee_id'     =>  0,
        'study_levels_id'       =>  0,
        'family_status_id'      =>  0,
        'nationality_id'        =>  0
    ];

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