<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en prive
    abstract class Model {
    	
    	private static $_instance;
		
    	private function __construct() {
    		
    	}
		
		public static function getInstance() {
			return self::$_instance;
		}
	
	/* 	Load  */
		
 		public function load($id) {
		
 			$requete = 'SELECT * FROM'.$this->_table.' WHERE id = '.$id;
			$tab = Database::getInstance()->getResultats($requete);
			
			foreach( $this->_fields as $key => $value )
			{
				if (array_key_exists($key,$this->_fields)){
					$this->_fields[$key] = $value;
				}
				// $this->_fields[$key] = $value; bon aussi
			}
			return $this;

		}

		public function delete() { // on delete sur un objet deja renseigne donc pas besoin de l'id
		
			$requete = 'DELETE FROM'.$this->_table.' WHERE id = '.$this->_fields['id'];
			$result = Database::getInstance()->getResultats($requete);
				
			return $result;
		
		}
		
		public function save()
		{
			if( $this->_fields['id'] != 0 )
			{
				$this->update();
			}
			else
			{
				
			}
		}
		
		public function getData($cle) { // on recupere la valeur de la colonne passe en parametre 
			
			if (isset($this->_fields[$cle])){
				return $this->_fields[$cle];
			}else{
				return "";
			}
		
		}
		
    }
?>