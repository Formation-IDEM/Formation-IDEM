<?php

include_once('Models/Model.php');

class Nationality extends Model
{

	public function __construct ()
	{
		parent::__construct();

		$this->_table = 'nationalities';
        $this->_fields['id'] = 0;
        $this->_fields['title'] = '';			
	}				
}

?>