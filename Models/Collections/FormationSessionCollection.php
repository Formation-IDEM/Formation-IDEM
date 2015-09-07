<?php

class FormationSessionCollection extends Collection
{

	public function __construct()
	{
		$this->_table = 'formation_sessions';

		$this->_field = 'timesheet';

		$this->_model_name = 'FormationSession';
	}	

}

?>