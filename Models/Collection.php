<?php

class Collection{

	protected $_table;

	protected $_field;

	protected $_model_name;

	protected $_items = null;

	protected $_item = null;

	public function __construct(){

	}

	/**
	 * Récupère un item
	 *
	 * @param $id
	 * @return null
	 */

	public function getItem($id){

		if( !$this->_item ){

			$query = 'SELECT * FROM ' . $this->_table . ' WHERE id = ' . $id;
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


	public function count($field = 'id', $where = ''){
		if (!$this->_items) {

			$query = 'SELECT COUNT(' . $field . ') AS total FROM ' . $this->_table;

			if (!empty($where)) {
				$query .= ' WHERE ' . $where;
			}

			$result = Database::getInstance()->getResult($query);

			return $result['total'];
		}
		return count($this->_items);

	}


	/**
	 * Retourne tous les items d'une table
	 *
	 * @return array
	 */

	public function getAllItems(){

		if( !$this->_items ) {

			$query = 'SELECT * FROM ' . $this->_table;
			$results = Database::getInstance()->getResults($query);

			foreach($results as $item) {

				$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
			}			
		}

		return $this->_items;
	}

	/*public function getMatchedItems($model, $champs){

		$query = 'SELECT * FROM '.$this->_table.' WHERE '.$champs.' = '.$model->getData($champs);
		$results = Database::getInstance()->getResults($query);
		foreach ($results as $item) { var_dump($model->getData($champs));
			$this->_items[$item[$champs]] = App::getModel($this->_model_name)->load($item[$champs]);
		}
		return $this->_items;

	}*/

	public function getFilteredItems($champs,$op, $valeur){

		$query = 'SELECT * FROM '.$this->_table.' WHERE '.$champs.$op.$valeur;
		$results = Database::getInstance()->getResults($query);

		foreach ($results as $item) {

			$this->_items[$item['id']] = App::getModel($this->_model_name)->load($item['id']);
		}
		return $this->_items;
	}

}

?>
