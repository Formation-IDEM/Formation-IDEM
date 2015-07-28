<?php

include_once("Model.php");

class FamilyStatus extends Model {
	
	public function __construct () {
		$this->_table = 'family_status';
		$this->_fields = array(
				'id' 	=> 0,
				'title' => ''
		);	
	}
}

?>