<?php

/**
 * Ma class Front controller
 */
class FrontController{
	
	public function __construct() {
		
		
	}
	
	public function indexAction(){
		
		$monFormateur = App::getModel('Trainer');
		$monFormateur->load(1);
		//$monFormateur->delete();
		$monFormateur->store(array(	"further_informations" => 'bonjour',
									"study_levels_id" => 1)
							);
							
		$monFormateur->save(1);
		
		//Template::getInstance()->setDatas(array('test'=>'triple X'))->render();
		
	}
	
	public function erreurAction(){
		
		echo "adresse introuvable ou erreur dans l'adresse";
		
	}	
}

 
?>

