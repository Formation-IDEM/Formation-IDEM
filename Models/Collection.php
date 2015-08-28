<?php

class Collection
{	
	protected $_table;

	protected $_field;

	protected $_model_name;

	protected $_items = null;

	protected $_item = null;

	public function __construct(){}

	public function getFilteredItems($field, $id)
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE '.$field.' = '.$id.' AND active = TRUE';
			$results = Database::getInstance()->getResults($query);
			$items = array();
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}

	public function getDoubleFilteredItems($field1, $id1, $field2, $id2)
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE '.$field1.' = '.$id1.' AND '.$field2.' = '.$id2.' AND active = TRUE';
			$results = Database::getInstance()->getResults($query);
			$items = array();
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}

	public function getAllItems()
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE active = TRUE';
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