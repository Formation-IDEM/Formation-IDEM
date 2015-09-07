<?php

class TrainerController
{
	
	public function indexAction()
	{
		header('Location: /index.php?c=trainer&a=list');
	}

	public function listAction()
	{
		if(isset($_POST['delete']) && $_POST['delete'])
		{
			$levels = App::getModel('Trainer')->load($_POST['trainer'])->getLevels();
			$timesheets = App::getModel('Trainer')->load($_POST['trainer'])->getTimesheets();

			$trainer = App::getModel('Trainer')->load($_POST['trainer']);
			if($levels || $timesheets)
			{
				foreach($levels as $level)
				{
					$level
					->setData('active',false)
					->save();
				}
				foreach($timesheets as $timesheet)
				{
					$timesheet
					->setData('active',false)
					->save();
				}
				$trainer
				->setData('active', false)
				->save();
			}
			else
			{
				$trainer->delete();				
			}

		}

		$trainers = App::getCollection('Trainer')->getAllItems();
		Template::getInstance()
			->setDatas(array(
					'trainers' => $trainers,
					'title'		=> 'Liste des formateurs'
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
					$levels = App::getCollection('Level')->getDoubleFilteredItems('matter_id', $_POST['matter_id'], 'trainer_id', $_GET['id']);
					if(!$levels) // Prévention doublon matière / formateur
					{
						$level = App::getModel('Level');
						$level
						->setData('matter_id', $_POST['matter_id'])
						->setData('trainer_id', $_GET['id'])
						->save();					
					}
				}

			}
			Template::getInstance()
				->setDatas(array(
						'matters' 	=> App::getCollection('Matter')->getAllItems(),
						'trainer'	=> $trainer,
						'title'		=> 'Gestion des compétences'
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

			Template::getInstance()
				->setDatas(array(
						'formationSessions' 	=> App::getCollection('FormationSession')->getAllItems(),
						'trainer'				=> App::getModel('Trainer')->load($_GET['id']),
						'title'					=> 'Feuilles de présences'
						))
				->setFilename('Trainer/timesheet')
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
					'studyLevels' 	=> App::getCollection('StudyLevel')->getAllItems(),
					'title'		=> 'Ajouter / Modifier un formateur'
					))
			->setFilename('Trainer/add-edit')
			->render();
	}
}

?>