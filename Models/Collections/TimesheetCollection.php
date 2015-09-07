<?php
class TimesheetCollection extends Collection{
	
	public function __construct()
	{
		$this->_table = 'timesheets';

		$this->_field = 'trainer';

		$this->_model_name = 'Timesheet';

	}

}
?>