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
		
        //Récupere la formation lié a la current formationsession
        public function getFormation(){
            
            if( !$this -> _formation ){
                
                $this->_formation = App::getModel('Timesheet');
                $this->_formation -> load($this->getData('formation_session_id') );             
                
            }
                
            return $this -> _formation;
                
        }
		
        //Récupere la formation lié a la current formationsession
        public function getTimesheet(){
            
            if( !$this -> _time_sheet ){
                
                $this->_time_sheet = App::getModel('Formation');
                $this->_time_sheet -> load($this->getData('formations_id') );             
                
            }
                
            return $this -> _time_sheet;
                
        }
	}