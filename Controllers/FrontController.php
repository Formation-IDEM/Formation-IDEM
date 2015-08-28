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
		return Template::getInstance()->setFilename('front.index')->setDatas([
			'title'				=>	'Tableau de bord',
			'countCompanies'	=>	App::getInstance()->getCollection('company')->count(),
			'countInternships'	=>	App::getInstance()->getCollection('internship')->count(),
			'countTrainers'		=>	App::getInstance()->getCollection('trainer')->count(),
		])->render();
	}
}
