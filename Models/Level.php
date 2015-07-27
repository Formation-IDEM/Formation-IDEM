<?php 

include_once( "Model.php" );

class Level extends Model {
	
	
	public function __construct() {
		$this->_table = 'study_levels';
		$this->_fields = array(
				'id' 	=> 0,
				'title' => ''
		);
	}
}


?>