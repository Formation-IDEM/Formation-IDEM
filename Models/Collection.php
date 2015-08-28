<?php

class Collection{

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

	public function getItem($id){

		if( !$this->_item ){
	
			$query = 'SELECT * FROM ' . $this->_table . ' WHERE '.$this->_field . '_id = ' . $id;
			$results = Database::getInstance()->getResults($query);
			if( isset($results[0]) ){

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
	public function getItems($id){

		if(!$this->_items){

			$query = 'SELECT * FROM ' . $this->_table . ' WHERE ' . $this->_field . '_id = ' . $id;
			$results = Database::getInstance()->getResults($query);
<<<<<<< HEAD
			foreach($results as $item) 
			{
=======
			$items = array();
			foreach($results as $item) {

>>>>>>> 4f3fba972d0cbb68eb55ba508718178f674ac60e
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
<<<<<<< HEAD
		if( !$this->_items )
		{
			$query = 'SELECT * FROM ' . $this->_table;
=======
		if(!$this->_items){

			$query = 'SELECT * FROM '.$this->_table.' WHERE ' . $this->_field1 . '_id = ' . $id1.' AND '.$this->_field2.'_id = '.$id2;
>>>>>>> 4f3fba972d0cbb68eb55ba508718178f674ac60e
			$results = Database::getInstance()->getResults($query);
			foreach($results as $item) {

				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}

		return $this->_items;
	}

	/**
	 * Retourne le nombre d'éléments d'une table
	 *
	 * @param string $field
	 * @param string $where
	 * @return mixed
	 */
<<<<<<< HEAD
	public function count($field = 'id', $where = '')
	{
		if( !$this->_items )
		{
			$query = 'SELECT COUNT(' . $field . ') AS total FROM ' . $this->_table;
			if( !empty($where) )
			{
				$query .= ' WHERE ' . $where;
			}
			$result = Database::getInstance()->getResult($query);

			return $result['total'];
		}
		return count($this->_items);
=======

	public function getAllItems(){

		if( !$this->_items ){

			$query = 'SELECT * FROM ' . $this->_table;
			$results = Database::getInstance()->getResults($query);
			foreach($results as $item) {

				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}

		return $this->_items;
>>>>>>> 4f3fba972d0cbb68eb55ba508718178f674ac60e
	}

	public function getFilteredItems($champs, $valeur){

		$query = 'SELECT * FROM '.$this->_table.' WHERE '.$champs.' = '.$valeur;
		$results = Database::getInstance()->getResults($query);
		foreach ($results as $item) {
			
			$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			
		}

	}

}