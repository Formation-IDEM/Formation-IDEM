<?php
namespace App\Models;

use Core\Factories\DatabaseFactory;
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
        'create_date'   =>  '',
        'update_date'   =>  '',
        'create_uid'    =>  0,
        'update_uid'    =>  0,
        'active'        =>  1,
        'pay'           =>  0,
        'wage'          =>  0,
        'reserved'      =>  0,
        'total_hours'   =>  0,
    ];

    public $_rules = [
        'title'     =>  'required|min:6|trim|entities',
        'explain'   =>  'trim|entities'
    ];

    protected $_company;
    protected $_formation;
    protected $_company_internship;

    public function __construct()
    {
        parent::__construct(DatabaseFactory::db());
        $this->_fields = array_merge($this->_fields, [
            'date_begin'        =>  date('Y-m-d'),
            'date_end'          =>  date('Y-m-d')
        ]);
    }

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