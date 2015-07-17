<?php
    
	class RefPedago{
		private $_formation_id;
		private $_matter_id;

		public function __contruct(){
			
			
		}
		
		//----------------------------------------------------------
		//Lecture et mise a jour de l'id----------------------------
		public function getFormationId(){
			
			return $this -> _formation_id;
		}
		
		public function setFormationId($formation_id){
			
			$this -> _formation_Id = $formation_id;
			
		}
			
		//----------------------------------------------------------
		//Lecture et mise a jour de l'intitulé----------------------
		public function getMatterId(){
			
			return $this -> _matter_id;
		}
		
		public function setMatterId($matter_id){
			
			$this -> _matter_id = $matter_id;
			
		}
		//----------------------------------------------------------
		//----------------------
		public function getFormation(){
			
			
			
		}
		
		//----------------------------------------------------------
		//----------------------
		public function getMatter(){
			
			
			
		}		
		
			
	};
	
?>