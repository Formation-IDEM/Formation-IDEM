<?php

include_once('Models/Model.php');

class FamilyStatus extends Model
{
	
	public function __construct ()
	{
		parent::__construct();

		$this->_table = 'family_status';
        $this->_fields['id'] = 0;
        $this->_fields['title'] = '';			
	}	
}

?>