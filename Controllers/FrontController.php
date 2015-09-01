<?php

/**
 * Class FrontController
 */
class FrontController
{
	function indexAction()
	{
		$stats = [
			'trainers'		=>	App::getCollection('trainer')->count(),
			'formations'	=>	App::getCollection('formation')->count(),
			'companies'		=>	App::getCollection('company')->count(),
			'trainees'		=>	App::getCollection('trainee')->count(),
		];

		return Template::getInstance()->setFilename('Front/index')->setDatas(compact('stats'))->render();
	}

	public function aboutAction()
	{

	}
}
