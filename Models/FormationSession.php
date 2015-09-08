<?php	
	
class FormationSession extends Model
{
	
	protected $_formation = null;
	protected $_table = 'formation_sessions';
	protected $_fields = array(
		'id' 					=> 0,
		'begin_date' 			=> '',
		'ending_date' 			=> '',
		'formations_id'			=> 0		
	
	);		
	
	public function construct(){}

	public function getFormation()
	{
		if(!$this->_formation)
		{
			$formation = App::getModel('Formation')->load($this->getData('formations_id'));
			$this->_formation = $formation;
		}
			
		return $this->_formation;	
	}
	
}

?>