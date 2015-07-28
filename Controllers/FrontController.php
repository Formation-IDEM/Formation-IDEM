<?php
class FrontController{
	
	public function __construct(){
		
	}
	
	public function indexAction(){
		
		$trainer = App::getModel('Trainer');
		//$trainer->load($_GET['id']);
		Template::getInstance()->setDatas(array('trainer' => $trainer))->setFilename('Trainer/add-edit')->render();
	}
}

?>