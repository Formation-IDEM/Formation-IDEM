<?php
    
    class RefPedago extends Model{
		
		protected $_formation = null;
		protected $_matter = null;
		
		protected $_table = "ref_pedagos";
		protected $_fields = array(
									'id'				=> 0,
									'formations_id' 	=> 0,
									'matters_id' 		=> 0	
		
		);

		public function __contruct(){
				
		}
		
		//Récupere la matière lié a la current refpedago
		public function getMatter(){
			
			if(!$this -> _matter){
				
				$this -> _matter = App::getModel('Matter');
				$this -> _matter -> load($this->getData('matters_id') );
				
			}
				
				return $this -> _matter;
			
		}		
		
		//Récupere la formation lié a la current refpedago
		public function getFormation(){
			
			if( !$this -> _formation ){
				
				$f = App::getModel('Formation');
				$f -> load($this->getData('formation_id') );
				$this->_formation = $f;				
				
			}
				
				return $this -> _formation;
				
		}
			
	}
	
?>