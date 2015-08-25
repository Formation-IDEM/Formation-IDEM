<?php

class TrainerController
{
	
	public function indexAction()
	{
		echo "Trainers basic page";
	}

	public function listAction()
	{
		//$trainer = App::getModel('Trainer')->setData('name','patrick')->save();
		$trainers = App::getCollection('Trainer')->getAllItems();
		Template::getInstance()
			->setDatas(array(
					'trainers' => $trainers
							))
			->setFilename('Trainer/list')
			->render();
	}

	public function showAction()
	{
		//$trainer = App::getModel('Trainer')->setData('name','patrick')->save();
		$trainer = App::getModel('Trainer')->load($_GET['id']);
		Template::getInstance()
			->setDatas(array(
					'trainer' => $trainer
							))
			->setFilename('Trainer/show')
			->render();
	}

	public function addEditMattersAction()
	{
		if(isset($_GET['id']))
		{
			$trainer = App::getModel('Trainer')->load($_GET['id']);
			Template::getInstance()
				->setDatas(array(
						'matters' 	=> App::getCollection('Matter')->getAllItems(),
						'levels'	=> $trainer->getLevels()
						))
				->setFilename('Trainer/levels')
				->render();
		}
	}

	public function editLevelAction()
	{
		if(isset($_GET['id']))
		{
			$level = App::getModel('Level')->load($_GET['id']);
			if(isset($_POST) && $_POST != null)
			{
				$level
				->store($_POST)
				->save();
			}
			Template::getInstance()
				->setDatas(array(
						'level' 	=> $level
						))
				->setFilename('Trainer/edit-level')
				->render();
		}
	}
	
	public function addEditAction()
	{
		// Si c'est pour un edit
		if(isset($_GET['id']))
		{
			$trainer = App::getModel('Trainer')->load($_GET['id']);
		}
		else // Si c'est pour un add
		{
			$trainer = App::getModel('Trainer');
		}
		// Si retour de formulaire
		if(isset($_POST) && $_POST != null)
		{
			// $trainer_extern = $_POST['trainer_extern'];
			// $hourly_rate = $_POST['hourly_rate'];

			// unset($_POST['trainer_extern'],$_POST['hourly_rate']);
			$trainer
			->store($_POST)
			->save();
			
			// if($trainer_extern)
			// {
			// 	$trainerExtern = $trainer->getTrainerExtern();
			// 	var_dump($trainerExtern);
			// 	if(!$trainerExtern)
			// 	{
			// 		$trainerExtern = App::getModel('TrainerExtern');
			// 		$trainerExtern->setData('trainer_id', $trainer->getData('id'));
			// 	}
			// 	var_dump($trainerExtern);
			// 	$trainerExtern
			// 	->setData('hourly_rate',$hourly_rate)
			// 	->save();
			// }
		}
		Template::getInstance()
			->setDatas(array(
					'trainer' 	=> $trainer,
					))
			->setFilename('Trainer/add-edit')
			->render();
	}
	
	public function deleteAction()
	{
		echo "Delete action on Trainer";
	}

	public function errorAction()
	{
		echo "An error as occured! ACTION NAME";
	}
}

?>