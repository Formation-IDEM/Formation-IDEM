<?php
namespace App\Models;

use Core\Factories\ModelFactory;
use \Core\Model;
/**
 * Class CompanyInternshipModel
 * @package App\Models
 */
class CompanyInternship extends Model
{
    protected $_table = 'company_internship';

    protected $_fields = [
        'trainee_id'        =>  0,
        'company_id'        =>  0,
        'internship_id'     =>  0,
        'active'            =>  1,
        'hiring'            =>  0,
    ];

    /**
     * Charge l'étudiant
     *
     * @return mixed
     */
    public function getTrainee()
    {
        $trainee = ModelFactory::loadModel('trainee');
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
        $company = ModelFactory::loadModel('company');
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
        $internship = ModelFactory::loadModel('internship');
        $internship->load($this->_fields['internship_id']);
        return $internship;
    }
}