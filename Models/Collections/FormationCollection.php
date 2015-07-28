<?php

class FormationCollection extends Collection {
	
	protected $_items = null;
	
	public function __construct(){
		
		$this -> _table = "formations";
		
		$this -> _model_name = "Formation";
		
	}	
	
	//1eme permet de choisir par rapport a quoi on récupe les ref pedago
	//2eme permet de choisir l'id
	public function getItems( $table_name,$id/*,$mod = 0*/){
		
		//switch
			//si 0 $alt = truc;
			//si "truc" $alt = machin
		
		//si on a pas encore getItems
		if(!$this -> _items){
		
			$req = 'SELECT * FROM '.$this->_table.' WHERE '.$table_name.'_id='.$id;
			
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