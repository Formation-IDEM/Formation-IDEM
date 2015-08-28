<?php


class Collection {

		protected $_table;
		protected $_modelName;
		protected $_items = array();

	function __construct() {



	}

	public function getItems ($id){
		$req = 'SELECT * FROM '.$this->_table.'WHERE company_id='.$id;
		$result = Database::getInstace()->execute($result);
		foreach ($result as  $data ) {

				$this->_items[]=App::getModel($this->_modelName)->load($data['id']);

		}
		return $this->_items;
	}
	
	
	public function getFilteredItems($champs, $valeur){
		
		$query = 'SELECT * FROM'
		
	}

}


?>