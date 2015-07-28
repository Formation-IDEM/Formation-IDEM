<?php
namespace App\Models;

use \Core\Model;
use \Core\Factories\ModelFactory;
use \Core\Factories\CollectionFactory;
/**
 * Class InternshipModel
 * @package App\Models
 */
class Internship extends Model
{
	protected $_fields = [
        'id'            =>  0,
        'title'         =>  '',
        'explain'       =>  '',
        'company_id'    =>  0,
        'formation_id'  =>  0,
        'referent_id'   =>  0,
        'create_date'   =>  '',
        'update_date'   =>  '',
        'create_uid'    =>  0,
        'update_uid'    =>  0,
        'active'        =>  0,
        'pay'           =>  false,
        'wage'          =>  0
    ];

    protected $_company;
    protected $_formation;
    protected $_referent;

    /**
     * Changer l'entreprise
     *
     * @return mixed
     */
    public function getCompany()
    {
        if( !$this->_company )
        {
            $this->_company = ModelFactory::loadModel('company');
            $this->_company->load($this->getData('company_id'));
        }

        return $this->_company;
    }

    /**
     * Charge la formation
     *
     * @return mixed
     */
    public function getFormation()
    {
        if( !$this->_formation )
        {
            $this->_formation = ModelFactory::loadModel('formation');
            $this->_formation->load($this->_fields['formation_id']);
        }

        return $this->_formation;
    }

    /**
     * Charge le référent (formateur)
     *
     * @return mixed
     */
    public function getReferent()
    {
        if( !$this->_referent )
        {
            $this->_referent = ModelFactory::loadModel('trainer');
            $this->_referent->load($this->_fields['referent_id']);
        }

        return $this->_referent;
    }

    /**
     * Retourne la collection
     * @return mixed
     */
    public function getCollection()
    {
        return CollectionFactory::loadCollection('internship');
    }
}