<?php

/**
 * Class FrontController
 */
class FrontController
{
	/**
	 * Tableau de bord
	 */
	function indexAction()
	{
<<<<<<< HEAD
		return Template::getInstance()->setFilename('Front/index')->setDatas(['title' => 'Accueil',])->render();
=======
<<<<<<< HEAD
		return Template::getInstance()->setFilename('front.index')->setDatas([
			'title'				=>	'Tableau de bord',
			'countCompanies'		=>	App::getInstance()->getCollection('company')->count(),
			'countInternships'	=>	App::getInstance()->getCollection('internship')->count(),
			'countTrainers'		=>	App::getInstance()->getCollection('trainer')->count(),
=======
		return Template::getInstance()->setFilename('Front/index')->setDatas([
			'title'	=>	'Accueil',
>>>>>>> 4f3fba972d0cbb68eb55ba508718178f674ac60e
		])->render();
>>>>>>> 21cf6b60db9ac45d9e8e9476c118a7aaf6fbc59e
	}
}
