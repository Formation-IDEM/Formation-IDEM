<?php
namespace App\Controllers;

use \Core\Controller;
use Core\Factories\DatabaseFactory;

/**
 * Class HomeController
 *
 * @package App\Controllers
 */
class HomeController extends Controller
{
	protected $data = [];

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

		return $this->layout()->render('app/home', compact('stats'));
	}
}