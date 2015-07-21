<?php

<<<<<<< HEAD
/**
 * Ma class Front controller
 */
class FrontController{
	
	public function __construct() {
		
		
	}
	
	public function indexAction(){
		
		echo "index";
		
	}
	
	public function erreurAction(){
		
		echo "adresse introuvable ou erreur dans l'adresse";
		
	}
	
	
}

 
?>
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
}

?>
>>>>>>> 459d5f36845054875cd6af5310157fd8db4d92e7
