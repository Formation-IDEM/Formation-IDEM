<?php

/**
 * controleur de la classe eentreprise
 */
class companyController  
{
	
	function __construct() 
	{
		
	}
	
	public function registerAction()
	{
		$mC = App::getModel('Company');
		$mC->load(0);
	}
	
}



?>