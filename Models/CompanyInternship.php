<?php
/*
 * Class CompanyInternshipModel
 */
class CompanyInternship extends Model
{
    protected $_fields = [
        'trainee_id'        =>  0,
        'company_id'        =>  0,
        'internship_id'     =>  0,
        'active'            =>  false,
        'hiring'            =>  false,
        'total_hours'       =>  0,
        'date_begin'        =>  '',
        'date_end'          =>  ''
    ];

    /**
     * Charge l'étudiant
     *
     * @return mixed
     */
    public function getTrainee()
    {
        $trainee = App::getModel('trainee');
        $trainee->load($this->_fields['trainee_id']);
        return $trainee;
    }

    /**
     * Changer l'entreprise
     *
     * @return mixed
     */
    public function getCompany()
    {
        $company = App::getModel('company');
        $company->load($this->_fields['company_id']);
        return $company;
    }

    /**
     * Charge le stage
     *
     * @return mixed
     */
    public function getInternship()
    {
        $internship = App::getModel('internship');
        $internship->load($this->_fields['internship_id']);
        return $internship;
    }
}