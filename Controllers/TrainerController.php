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
		if(isset($_POST['delete']) && $_POST['delete'])
		{

			$levels = App::getCollection('Level')->getItems($_POST['trainer']);

			if($levels)
			{
				foreach ($levels as $level) {
					$level->delete();
				}		
			}


			$timesheets = App::getCollection('Timesheet')->getItems($_POST['trainer']);

			if($timesheets)
			{
				foreach ($timesheets as $timesheet) {
					$timesheet->delete();
				}				
			}

			$trainer = App::getModel('Trainer')->load($_POST['trainer']);
			$trainer->delete();
		}

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
			if(isset($_POST) && $_POST != null)
			{
				if(isset($_POST['delete']) && $_POST['delete'])
				{
					$level = App::getModel('Level')->load($_POST['level']);
					$level->delete();
				}
				else
				{
					$levels = App::getCollection('Level')->getItemsFromAssociation($_POST['matters'], $_GET['id']);
					if(!$levels)
					{
						$level = App::getModel('Level');
						$level
						->setData('matter_id', $_POST['matters'])
						->setData('trainer_id', $_GET['id'])
						->save();					
					}
				}

			}
			Template::getInstance()
				->setDatas(array(
						'matters' 	=> App::getCollection('Matter')->getAllItems(),
						'levels'	=> $trainer->getLevels(),
						'trainer'	=> $trainer
						))
				->setFilename('Trainer/levels')
				->render();
		}

	}

	public function timesheetAction()
	{
		if(isset($_GET['id']))
		{
			if(isset($_POST) && $_POST != null)
			{
				if(isset($_POST['delete']) && $_POST['delete'])
				{
					$timesheet = App::getModel('Timesheet')->load($_POST['timesheet_id']);
					$timesheet->delete();
				}
				else
				{
					$timesheet = App::getModel('Timesheet');
					$timesheet
					->setData('trainer_id', $_GET['id'])
					->store($_POST)
					->save();					
				}
			}

				$trainer = 
			Template::getInstance()
				->setDatas(array(
						'formationSessions' 	=> App::getCollection('FormationSession')->getAllItems(),
						'trainer'				=> App::getModel('Trainer')->load($_GET['id'])
						))
				->setFilename('Trainer/timesheet')
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
						'level' 	=> $level,
						'trainer'	=>$level->getTrainer()
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
			$trainer
			->store($_POST)
			->save();
		}
		Template::getInstance()
			->setDatas(array(
					'trainer' 		=> $trainer,
					'nationalities' => App::getCollection('Nationality')->getAllItems(),
					'familyStatuss' => App::getCollection('FamilyStatus')->getAllItems(),
					'studyLevels' => App::getCollection('StudyLevel')->getAllItems()
					))
			->setFilename('Trainer/add-edit')
			->render();
	}
}

?>