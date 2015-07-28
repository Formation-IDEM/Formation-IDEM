<?php
    
include_once('Model.php');


    class RefPedago extends Model{
		
		protected $_formation = null;
		protected $_matter = null;
		
		protected $_table = "ref_pedagos";
		protected $_fields = array(
									'formations_id' 	=> 0,
									'matters_id' 		=> 0	
		
		);

		public function __contruct(){
				
		}

		//----------------------------------------------------------
		//----------------------
		public function getFormation(){
			
			if( !$this -> _formation){
				
				$f = App::getModel('Formation');
				$f -> load($this->getData('formation_id') );
				return $f;
				
			}else{
				
				return $this -> _formation;
				
			}
			
		}
		
		//----------------------------------------------------------
		//----------------------
		public function getMatter(){
			
			if(!$this -> _matter){
				
				$m = App::getModel('Matter');
				$m -> load($this->getData('matter_id') );
				return $m;
				
			}else{
				
				return $this -> _matter;
			
			}
			
		}		
			
	}
	
?>