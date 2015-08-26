<?php

class LevelCollection extends Collection
{

	public function __construct()
	{
		$this->_table = 'levels';

		$this->_field = 'trainer';

		$this->_field1 = 'matter';

		$this->_field2 = 'trainer';

		$this->_model_name = 'Level';
	}	

}

?>