<?php

/**
 * Class FrontController
 */
class FrontController
{
	function indexAction()
	{
		return Template::getInstance()->setFilename('front.index')->setDatas([
			'title'	=>	'Accueil',
		])->render();
	}
}
