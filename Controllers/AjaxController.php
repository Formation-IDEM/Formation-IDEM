<?php

class AjaxController
{
	public function listTrainerAction()
	{
		if($_POST['firstname'] != null)
		{
			$trainers = App::getCollection('Trainer')->where('firstname','LIKE',$_POST['firstname'])->all();			
		}
		else
		{
			$trainers = App::getCollection('Trainer')->all();			
		}
		Template::getInstance()
			->setDatas(array(
					'trainers' => $trainers
							))
			->setFilename('Ajax/trainer-list')
			->isAjax()
			->render();
	}

	public function autoCompleteAction()
	{
		$trainers = App::getCollection('Trainer')->select('firstname')->where('firstname','LIKE',$_GET['q'])->all();
		//var_dump($trainers);
		foreach($trainers as $trainer)
		{
			$json[] = $trainer->firstname;
		}
		echo json_encode($json);
	}
}