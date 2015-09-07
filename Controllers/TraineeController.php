<?php

class TraineeController
{
	public function indexAction()
	{
		Template::getInstance()
			->setFilename('Trainee/index')
			->render();
	}
}