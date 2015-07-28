<?php	
	
include_once('Model.php');

    class FormationSession extends Model{
		
		protected $_table = "formation_sessions";
		protected $_fields = array(
									'id' 					=> 0,
									'begin_date' 			=> '',
									'ending_date' 			=> '',
									'formations_id'			=> 0		
		
		);		
		
		public function construct(){
			
		}

		public function getFormation(){
			
			$f = App::getModel('Formation');
			$f -> load($this-> getData('formation_id') );
			return $f;
			
		} 
		
	}