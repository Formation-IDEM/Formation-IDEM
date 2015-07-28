<?php	
	
class FormationSession extends Model{
	
	protected $_formation=null;
	protected $_table = "formation_sessions";
	protected $_fields = array(
								'id' 					=> 0,
								'begin_date' 			=> '',
								'ending_date' 			=> '',
								'formations_id'			=> 0		
	
	);		
	
	public function construct(){
		
	}
	public function getFormation(){
		
		if(!$this->_formation){
			
			$f = App::getModel('Formation');
			$f -> load($this-> getData('formation_id') );
			$this->_formation = $f;
			
		}
			
		return $this -> _formation;
		
	} 
	
}

?>