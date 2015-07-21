<?php

class FrontController
{
	function indexAction()
	{
		echo 'default page';
		$trainer = App::getModel('Trainer');
		$trainer->load(4)->delete();
		//var_dump($trainer);
	}
	
	function testAction()
	{
		echo 'its a test! On front controller and test action';
	}	
}

?>