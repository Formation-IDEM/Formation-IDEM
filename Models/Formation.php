<?php

    class Formation extends Model{
    	
		protected $_ref_pedago = null;
		protected $_formation_session = null;
		
		protected $_table = "formations";
		protected $_fields = array(
									'id' 							=> 0,
									'title' 						=> '',
									'average_effective' 			=> 0,
									'convention_hour_center'		=> 0,
									'convention_hour_company' 		=> 0,
									'deal_code' 					=> '',
									'order_giver' 					=> '',
									'deal_begin_date' 				=> '',
									'deal_ending_date' 				=> ''
		
		);
        
        public function __construct(){
            
        }
		
		public function getTable(){
			
			return $this -> _table;
		}
	
		//permet de récuperé la collection des reférence pédagogique
		public function getRefPedago(){
			
			if($this->_ref_pedago == null){
				
				$this->_ref_pedago = App::getModel('RefPedago');
                $this->_ref_pedago->load( $this->getData('id') );
                
			}
            
            return $this -> _ref_pedago;
			
		}

		//permet de récuperé la collection des formations session
		public function getFormationSessions(){
			
            if($this->_formation_session == null){
                
                $this->_formation_session = App::getModel('FormationSession');
                $this->_formation_session->load( $this->getData('id') );
                
            }
            
            return $this -> _ref_pedago;
			
		}
     
    }
    
?>