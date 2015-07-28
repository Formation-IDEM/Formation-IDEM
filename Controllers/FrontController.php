<?php

include_once(dirname(dirname(__FILE__))."/Models/Model.php");

class FrontController extends Model
{
	
	
	function indexAction()
	{		
		$internship = App::getModel('internship');
		$internship->load(1);
		Template::getInstance()->setDatas(array())->setFilename('index')->render();
		
		Template::getInstance()->setTemplate('Company/AccueilCompany')->setDatas(array('macle' => "Bonjour Jean Luc"))->render();	
	}	
}

?>