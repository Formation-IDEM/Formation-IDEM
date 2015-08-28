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
	
	public function getItems($where = "",$id = 0){
	    
		//si on a pas encore getItems
		if(!$this -> _items){
		    
            if($id != 0){                
                //Si on a récuperé un id dans l'URL pour le filtre
                $req = 'SELECT DISTINCT * FROM '.$this->_table.' WHERE ';
                $req .= $where;
                $req .= '='.$id;
            }else{
                //Si on est dans l'cas par défaut, afficher tous
                $req = 'SELECT * FROM '.$this->_table;
            }
			
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