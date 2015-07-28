<?php
    
include_once('Model.php');

    class RefPedago extends Model{
		
		protected $_table = "matters";
		protected $_fields = array(
									'formations_id' 	=> 0,
									'matters_id' 		=> 0	
		
		);

		public function __contruct(){
			
			
		}

		//----------------------------------------------------------
		//----------------------
		public function getFormation(){
			
			$f = App::getModel('Formation');
			$f -> load($this->getData('formation_id') );
			return $f;
			
		}
		
		//----------------------------------------------------------
		//----------------------
		public function getMatter(){
			
			$m = App::getModel('Matter');
			$m -> load($this->getData('matter_id') );
			return $m;
			
			
		}		
		
			
	};
	
?>