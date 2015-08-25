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
	
	public function addEditAction()
	{
		$trainer = App::getModel('Trainer');
		Template::getInstance()
			->setDatas(array(
					'trainer' => $trainer
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