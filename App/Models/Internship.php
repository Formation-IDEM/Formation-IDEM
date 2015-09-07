<?php
namespace App\Models;

use \Core\Model;
use \Core\Factories\ModelFactory;
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
        'referent'      =>  '',
        'create_date'   =>  null,
        'update_date'   =>  null,
        'create_uid'    =>  0,
        'update_uid'    =>  0,
        'active'        =>  0,
        'pay'           =>  0,
        'wage'          =>  0
    ];

    public $_rules = [
        'title'     =>  'required|min:6|trim|entities',
        'explain'   =>  'trim|entities'
    ];

    protected $_company;
    protected $_formation;
    protected $_company_internship;

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
     * Le stage est-il rémunéré ? Oui / non
     *
     * @return string
     */
    public function getWage()
    {
        if( $this->_fields['wage'] )
        {
            return 'oui';
        }
        return 'non';
    }
}