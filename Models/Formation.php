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
            $this->_fields['deal_begin_date'] = date('d/m/Y',time());
            $this->_fields['deal_ending_date'] = date('d/m/Y',time());;
        }
		
		public function getTable(){
			
			return $this -> _table;
		}
        
    }
    
?>