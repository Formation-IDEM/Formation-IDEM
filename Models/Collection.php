<?php

class Collection
{	
	protected $_table;

	protected $_field;

	protected $_model_name;

	protected $_items = null;

	public function __construct(){}

	public function getItems($id)
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE '.$this->_field.'_id = '.$id;
			$results = Database::getInstance()->getResults($query);
			$items = array();
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}
}

?>