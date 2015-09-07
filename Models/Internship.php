<?php
/**
 * Class InternshipModel
 */
class Internship extends Model
{

    protected $_table = 'internships';
    protected $_fields = [
        'id'            =>  0,
        'title'         =>  '',
        'explain'       =>  '',
        'company_id'    =>  0,
        'formation_id'  =>  0,
        'referent'      =>  '',
        'create_date'   =>  null,
        'update_date'   =>  null,
        'create_uid'    =>  0,
        'update_uid'    =>  0,
        'active'        =>  0,
        'pay'           =>  0,
        'wage'          =>  0
    ];

    protected $_company = null;
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
            $this->_company = App::getModel('company')->load($this->getData('company_id'));
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
            $this->_formation = App::getModel('formation');
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
            $this->_referent = App::getModel('trainer');
            $this->_referent->load($this->_fields['referent_id']);
        }

        return $this->_referent;
    }
}