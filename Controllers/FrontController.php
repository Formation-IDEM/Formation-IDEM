<?php

/**
 * Class FrontController
 */
class FrontController
{
	function indexAction()
	{
		return Template::getInstance()->setFilename('Front/index')->setDatas([
			'title'	=>	'Accueil',
		])->render();
	}
}
