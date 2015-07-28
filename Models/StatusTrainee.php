<?php

include_once( "Model.php" );

class StatusTrainee extends Model {
	
	public function __construct() {
		$this->_table = 'trainee_status';
		$this->_fields = array(
				'id' 	=> 0,
				'title' => ''
		);	
	}
}
?>