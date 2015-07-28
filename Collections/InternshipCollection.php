<?php

include_once "dirname(__FILE__).'/Models/Collection.php'";
include_once "dirname(__FILE__).'/Models/Model.php'";

class InternshipCollection extends Collection
{
			
	
	public function __construct()
	{
		parent::__construct();
		$this->_table = 'internships';
		$this->_modelName = 'Internship';
	}
	
	public function getItems($idCompany)
	{
		if(!$this->_items)
		{
			$sql = "SELECT * FROM" .$this->_table. "WHERE company_id = \'" .$idCompany. "\'";
			$result = $this->_db->query($sql);
				foreach ($result as $data)
				{
					$this->_items = App::getInstance()->getModel($this->modelName)->load($data->id);			
				}
		}			
			return $this->_items;
	}
}
