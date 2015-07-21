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
				$this->_fields[$key] = $value;
			}

		}
		
		public function save()
		{
			if( $this->_fields['id'] != 0 )
			{
				$this->update();
			}
			else
			{
				$this->insert();
			}
		}
		
    }
?>