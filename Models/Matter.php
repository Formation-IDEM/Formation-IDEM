<?php
    
include_once('Model.php');

    class Matter extends Model{
		
		protected $_table = "matters";
		protected $_fields = array(
									'id' 		=> 0,
									'title' 	=> ''	
		
		);

		public function __contruct(){
			
			
		}
			
	}
	
?>