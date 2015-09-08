<?php

/**
 * Class CompanyCollection
 */

class CompanyInternshipCollection extends Collection{

    protected $_table = 'company_internship';
    protected $_model_name = 'CompanyInternship';

	public function getFilter($field, $op, $valeur){

		$query = 'SELECT * FROM '.$this->_table.' WHERE '.$field.$op.$valeur;
		$results = Database::getInstance()->getResult($query);

		foreach ($results as $item) {
		//var_dump(App::getModel($this->_model_name)->loadFilter($field, $item[$valeur]));

			$this->_items[$item[$field]] = App::getModel($this->_model_name)->loadByIds(array('trainee_id' => 1, 'company_id' =>59, 'internship_id' => 8 ));

		}
		return $this->_items;
	}
}