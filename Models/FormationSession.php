<?php	
	
	class FormationSession{
		
		private $_id;
		private $_begin_date;
		private $_ending_date;
		private $_formation_id;//Clef étrangère provenant de la table formation
		
		
		public function construct(){
			
		}
		
		//-----------------------------------------------------------
		//Lecture et mise a jour de l'id-----------------------------
		public function getId(){
			
			return $this -> _id;
			
		}
		
		public function setId($id){
			
			$this -> _id = $id;
			
		}
		
		//----------------------------------------------------------
		//Lecture et mise a jour de la date du début----------------
		public function getBeginDate(){
			
			return $this -> _begin_date;
					
		}		
		
		public function setBeginDate($begin_date){
			
			$this -> _begin_date = $begin_date;
			
		}
		
		//----------------------------------------------------------
		//Lecture et mise a jour de la date de fin------------------	
		public function getEndingDate(){
			
			return $this -> _ending_date;
			
		}
		
		public function setEndingDate($ending_date){
			
			$this -> _ending_date = $ending_date;
			
		}
			
		//----------------------------------------------------------
		//Lecture et mise a jour de la clé étrangère de la formation	
		public function getFormationId(){
			
			return $this -> _formation_id;
			
		}
		
		public function setFormationId($formation_id){
			
			$this -> _formation_id = $formation_id;
			
		}		
	}