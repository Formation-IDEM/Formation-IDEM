<?php
class FrontController
{
	function indexAction()
	{
		$trainer = App::getModel('Trainer');
		$trainer->load($_GET['id']);
		var_dump($trainer->getMatters());
		var_dump($trainer->getFormationSessions());
		$trainerExtern = App::getModel('TrainerExtern');
		/*$levels = $trainer->getLevels();
		foreach($levels as $level)
		{
			echo $level->getMatter()->getData('title');
		}*/
		


		/*Template::getInstance()
			->setDatas(array(
				'trainer5' => $trainer
				))
			->setFilename('index')
			->render();*/
		//$trainer->save();
		//echo $trainer->getData('id');
		//$trainer->load(4)->delete();
		//var_dump($trainer);
	}
}

?>
