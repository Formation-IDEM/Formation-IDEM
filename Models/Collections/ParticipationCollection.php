<?php
class ParticipationCollection extends Collection{
	
	public function __construct()
	{
		$this->_table = 'participations';

		$this->_model_name = 'Participation';

	}

}
?>