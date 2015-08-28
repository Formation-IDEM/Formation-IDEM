<?php

<<<<<<< HEAD
include_once ('../Collection.php');

/**
 * 
 */
class InternshipCollection extends Collection {

	function __construct() {

		$this->_table = 'internships';
		$this->_modelName = 'Internship';
	}

	public function getItems ($id){
		$req = 'SELECT * FROM '.$this->_table.'WHERE company_id='.$id;
		$result = Database::getInstace()->execute($result);
		foreach ($result as  $data ) {

				$this->_items[]=App::getModel($this->_modelName)->load($data['id']);

		}
		return $this->_items;
	}
}
?>
=======
/**
 * Class CompanyCollection
 */
class InternshipCollection extends Collection
{
    protected $_table = 'internships';
    protected $_model_name = 'internship';
}
>>>>>>> entreprises
