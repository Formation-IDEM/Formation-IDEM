<?php

include_once(dirname(dirname(__FILE__))."/Models/Collection.php");

class CompanyCollection extends Collection
{
	
	public function __construct()
	{
		parent::__construct();
		$this->_table = 'Companies';
		$this->_modelName = 'Company';
	}
	
	public function getAll()
	{
		if(!$this->_items)
		{
			$sql = "SELECT * FROM" .$this->_table;
			$result = $this->_db->query($sql);
				foreach ($result as $data)
				{
					$this->_items = App::getInstance()->getModel($this->modelName)->load($data->id);			
				}
		}			
			return $this->_items;
	}
	
}
