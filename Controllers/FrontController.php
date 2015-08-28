<?php

/**
 * Class FrontController
 */
class FrontController
{
	function indexAction()
	{
		return Template::getInstance()->setFilename('front.index')->setDatas([
			'title'			=>	'Tableau de bord',
			'companies'		=>	App::getInstance()->getCollection('company')->count(),
			'internships'	=>	App::getInstance()->getCollection('internship')->count(),
			'trainers'		=>	App::getInstance()->getCollection('trainer')->count(),
		])->render();
	}
}
