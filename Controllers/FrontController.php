<?php

class FrontController
{
	function indexAction()
	{
		$trainer = App::getModel('Trainer');
		$trainer->load($_GET['id']);
		TEMPLATE::getInstance()
		->setDatas
		(
			array
			(
				'trainer5'	=> $trainer
			)
		)
		->setFilename('index')
		->render(); 
		//$trainer->save();
		//echo $trainer->getData('id');
		//$trainer->load(4)->delete();
		//var_dump($trainer);
	}
}

?>
