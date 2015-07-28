<?php

include_once('Model.php');

    class Formation extends Model{
		
		protected $_table = "formations";
		protected $_fields = array(
									'id' 							=> 0,
									'title' 						=> '',
									'average_effective' 			=> 0,
									'convention_hour_center'		=> 0,
									'convention_hour_compagny' 		=> 0,
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
    }
    
?>