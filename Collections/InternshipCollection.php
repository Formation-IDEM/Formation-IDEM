<?php

class InternshipCollection extends Collection
{
	public function __construct()
	{
		parent::__construct();
		$this->_table = 'internships';
		$this->_modelName = 'Internship';
	}
	
	public function getItems($id)
	{
		$sql = "SELECT * FROM" .$this->_table. "WHERE company_id = \'" .$id. "\'";
		$result = $this->_db->query($sql);
		return $result;
	}
}
