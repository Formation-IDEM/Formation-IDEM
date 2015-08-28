<?php

class Collection
{	
	protected $_table;

	protected $_field;

	protected $_model_name;

	protected $_items = null;

	protected $_item = null;

	public function __construct(){}

	/**
	 * Récupère un item
	 *
	 * @param $id
	 * @return null
	 */
	public function getItem($id)
	{
		if( !$this->_item )
		{	
			$query = 'SELECT * FROM ' . $this->_table . ' WHERE '.$this->_field . '_id = ' . $id;
			$results = Database::getInstance()->getResults($query);
			if( isset($results[0]) )
			{
				$this->_item = App::getModel($this->_model_name)->load($results[0]['id']);				
			}
		}
		return $this->_item;
	}

	/**
	 * Récupère plusieurs items
	 *
	 * @param $id
	 * @return null
	 */
	public function getItems($id)
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM ' . $this->_table . ' WHERE ' . $this->_field . '_id = ' . $id;
			$results = Database::getInstance()->getResults($query);
			$items = array();
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}

	public function getItemsFromAssociation($id1, $id2)
	{
		if(!$this->_items)
		{
			$query = 'SELECT * FROM '.$this->_table.' WHERE ' . $this->_field1 . '_id = ' . $id1.' AND '.$this->_field2.'_id = '.$id2;
			$results = Database::getInstance()->getResults($query);
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}

	/**
	 * Retourne tous les items d'une table
	 *
	 * @return array
	 */
	public function getAllItems()
	{
		if( !$this->_items )
		{
			$query = 'SELECT * FROM ' . $this->_table;
			$results = Database::getInstance()->getResults($query);
			foreach($results as $item) 
			{
				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}
		return $this->_items;
	}
}