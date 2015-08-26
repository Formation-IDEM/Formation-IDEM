<?php

include_once('Database.php');

class Collection {

	protected $_items = null;

	protected $_table = "";
	protected $_model_name = "";
	
	
	public function __construct() {
	}
	
	public function setAttribut($table,$model){
		$this->_table = $table;
		$this->_model_name = $model;
	}
	
	public function getItems(){		
		
		//si on a pas encore getItems
		if(!$this -> _items){
		
			$req = 'SELECT * FROM '.$this->_table;
			
			$tab_item = array();
			
			if( $result = Database::getInstance()->getResultats( $req ) ){
				
				foreach ($result as $key => $value) {	
					
					//crée une instance de class
					$newitem = App::getModel($this->_model_name);
					
					//charge l'instance avec le n-eme id
					$tab_item[] = $newitem -> load($value['id']);
					
				}
				$this->_items = $tab_item;
				
				return $tab_item;
				
			}
		}else{
			
			//si on a déjà getItem, retourné l'tableau déjà crée 
			return $this->_items;
			
		}
	}

}

?>