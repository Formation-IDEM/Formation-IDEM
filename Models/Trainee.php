<?php

//================================= Include class person ============================

include_once ('Person.php');


//================================= Class trainee fille de class person =============

class Trainee extends Person {

	private $_nationality = null;
	private $_remunerationType = null;
	private $_statusTrainee = null;
	private $_familyStatus = null;
	private $_studyLevel = null;
	private $_sessionsTrainee = null;
	
	protected $_fields = array (
			'id'=>0 ,
			'name' => "" ,
			'firstname' => "" ,
			'birthday' => "" ,
			'birthplace' => "" ,
			'gender' => "" ,
			'adress_off_street' => "" ,
			'adress_off_complement' => "" ,
			'adress_off_codpost' => 0 ,
			'adress_off_city' => "" ,
			'adress_form_street' => "" ,
			'adress_form_complement' => "" ,
			'adress_form_codpost' => 0 ,
			'adress_form_city' => "" ,
			'phone' => 0 ,
			'mail' => "" ,
			'cellphone' => 0 ,
			'social_security_number' => 0 ,
			'photo' => "" ,
			'remuneration_type_id' => 0,
			'status_trainee_id' => 0,
			'study_levels_id' => 0,
			'family_status_id' => 0,
			'nationality_id' => 0,
			'create_date' => "",
			'update_date' => "",
			'create_uid' => 0,
			'update_uid' => 0,
			'active' => 0
	);
	
	// Fonction construction de la classe trainee
	
	public function __construct ()	{
		$this->_table = "trainees";
			}
		
	function getNationality(){
		if (!$this->_nationality){
			$this->_nationality = App::getModel('Nationality');
			$this->_nationality->load($this->getData('nationality_id'));
		}
		return $this->_nationality;
			
	}
	
	function getRemunerationType(){
		if (!$this->_remunerationType){
			$remunerationType = App::getModel('RemunerationType');
			$remunerationType->load($this->getData('remuneration_type_id'));
		}
		return $this->_remunerationType;
	}

	function getStatusTrainee(){
		if (!$this->_statusTrainee){
			$statusTrainee = App::getModel('StatusTrainee');
			$statusTrainee->load($this->getData('status_trainee_id'));
		}
		return $this->_statusTrainee;
	}
	
	function getFamilyStatus(){
		if (!$this->_familyStatus){
			$familyStatus = App::getModel('FamilyStatus');
			$familyStatus->load($this->getData('family_status_id'));
		}
		return $this->_familyStatus;
	}
	
	function getStudyLevel(){
		if (!$this->_studyLevel){
			$studyLevel = App::getModel('StudyLevel');
			$studyLevel->load($this->getData('study_levels_id'));
		}
		return $this->_studyLevel;
	}
	
	function getSessionsTrainee(){
		if (!$this->_sessionsTrainee){
			$sessionsTrainee = App::getCollection('SessionTraineeCollection');
			
			$this->_sessionsTrainee = $sessionsTrainee->getItems($this->getData('id'));
		}
		return $this->_sessionsTrainee;
	}
}
?>
