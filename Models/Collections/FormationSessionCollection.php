<?php

class FormationSessionCollection extends Collection {
	
	protected $_items = null;
	
	public function __construct(){
		
		$this -> _table = "formation_sessions";
		
		$this -> _model_name = "FormationSession";
		
	}	
	
	public function getItems($id){
		
		//si on a pas encore getItems
		if(!$this -> _items){
		
			$req = 'SELECT * FROM '.$this->_table.' WHERE formations_id='.$id;
			
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