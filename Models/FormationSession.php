<?php	

    class FormationSession extends Model{
		
		protected $_formation = null;		
		protected $_session_trainee = null;
		protected $_time_sheet = null;
		
		protected $_table = "formation_sessions";
		protected $_fields = array(
									'id' 					=> 0,
									'begin_date' 			=> '',
									'ending_date' 			=> '',
									'formations_id'			=> 0		
		
		);		
		
		public function construct(){
			
		}
		
        //Récupere la formation lié a la current refpedago
        public function getFormation(){
            
            if( !$this -> _formation ){
                
                $this->_formation = App::getModel('Formation');
                $this->_formation -> load($this->getData('formations_id') );             
                
            }
                
            return $this -> _formation;
                
        }
		
	
	}