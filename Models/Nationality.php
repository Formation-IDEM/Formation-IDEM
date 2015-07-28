<?php

include_once('Models/Model.php');

class Nationality extends Model
{	
	public function __construct() {
		$this->_table = 'nationalities';
		$this->_fields = array(
				'id' 	=> 0,
				'title' => ''
		);	
	}
				
}

?>