<?php

class FrontController extends Model
{
	/*public function indexAction()
	{
		
	}*/
	
	function indexAction()
	{
		Template::getInstance()->setTemplate('Company/AccueilCompany')->setDatas(array('macle' => "Bonjour Jean Luc"))->render();
	}	
}

?>