<?php

include_once(dirname(dirname(__FILE__))."/Models/Model.php");

class FrontController extends Model
{
	
	
	function indexAction()
	{		
		$internship = App::getModel('Internship');
		var_dump($internship);
		$internship->load($_GET['id']);
		
		Template::getInstance()->setDatas(array('intern'=> $internship))->setFilename('index')->render(); 
				
		Template::getInstance()->setTemplate('Company/AccueilCompany')->setDatas(array('macle' => "Bonjour Jean Luc"))->render();	
	}	
}

?>