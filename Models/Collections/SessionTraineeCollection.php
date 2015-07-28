<?php 
include_once ('./Models/Collection.php');

class SessionTraineeCollection extends Collection {
	
	protected $_items = array();
	
	public function __construct() {
		
			$this->_table = 'sessions_trainee';
			$this->_model_name = 'TraineeSession';
	}

	public function getItems($id){
		
			if (!$this->_items){
				$results = Database::getInstance()->getResultats( "SELECT * FROM " . $this->_table . " WHERE trainee_id = " . $id );
			
				foreach ($results as $result ) {
			
					$this->_items[] = App::getModel($this->_model_name)->load($result['id']);
				}
				
			}
			return $this->_items;
	}
	
	public function getFormationSession(){
		// Recherche le stagiaire par rapport à l'identifiant stagiaire
		// $formationsession = new formationsession();
		// $formationsession -> load($this -> formation_session_id);
		// return $formationsession
	}
	
	public function getLessonStudyHours(){
		return $this -> _lesson_study_hours;
	}
	
	public function setLessonStudyHours($lesson_study_hours) {
		$this -> _lesson_study_hours = $lesson_study_hours;
		return $this;
	}
	
	public function getStageStudyHours(){
		return $this -> _stage_study_hours;
	}
	
	public function setStageStudyHours($stage_study_hours) {
		$this -> _stage_study_hours = $stage_study_hours;
		return $this;
	}
	
}


?>