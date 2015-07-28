<?php

class RemunerationType extends Model {

	public function __construct() {
		$this->_table = 'remuneration_types';
		$this->_fields = array(
				'id' 	=> 0,
				'title' => ''
		);
	}
}
?>