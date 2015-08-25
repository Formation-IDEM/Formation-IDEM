<?php
namespace App\Controllers;

use \Core\Template;
use \Core\Controller;
use \Core\Factories\DatabaseFactory;

/**
 * Class HomeController
 *
 * @package App\Controllers
 */
class FrontController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function indexAction()
	{
		$stats = [
			'formations'	=>	DatabaseFactory::db()->count('formations', 'id'),
			'trainees'		=>	DatabaseFactory::db()->count('trainees', 'id'),
			'trainers'		=>	DatabaseFactory::db()->count('trainers', 'id'),
			'companies'		=>	DatabaseFactory::db()->count('companies', 'id')
		];

		return Template::getInstance()->render('front/front_index', compact('stats'));
	}
}