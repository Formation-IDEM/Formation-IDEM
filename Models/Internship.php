<?php
<<<<<<< HEAD

include_once ('Model.php');

/**
 * Classe Stage
 */
class Internship extends Model {

	protected $_company = null;

	function __construct() {

		parent::__construct();

	}

/*	public function getCompany(){

		if (!$this->_company) {
			$this->_company=App::getModel('Company')->load($this->getData('company_id'));
		}

		return $this->_company;
	}*/

}
=======
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
}
>>>>>>> entreprises
