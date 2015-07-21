<?php

<<<<<<< HEAD
class FrontController{
	
	public function __construct(){
		
	}
	
	public function indexAction(){
		echo "Accueil général";
	}
	
	public function bidon(){
		echo "Bidon";
	}
	
	public function errorCAction(){
		echo "An error as occured! CONTROLLER NAME";
	}
	
=======
class FrontController
{
	function indexAction()
	{
		echo 'default page';
	}
	
	function testAction()
	{
		echo 'its a test! On front controller and test action';
	}	
>>>>>>> 459d5f36845054875cd6af5310157fd8db4d92e7
}

?>