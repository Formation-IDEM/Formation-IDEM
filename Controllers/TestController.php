<?php

class TestController
{
	function indexAction()
	{
		echo 'default action in TestController';
		$trainer = new Trainer();
		$trainer->delete();
	}
	
	function testAction()
	{
		echo 'its a test!';
	}	
}

?>
