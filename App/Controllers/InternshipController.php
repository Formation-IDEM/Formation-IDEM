<?php
namespace App\Controllers;

use Core\Controller;
use \Core\Factories\CollectionFactory;

/**
 * Class InternshipController
 *
 * @package App\Controllers
 */
class InternshipController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Internship');
	}

	public function indexAction()
	{
		$collection = CollectionFactory::loadCollection('Internship');
		$collection->select()
			->from('internships')
			->join('companies', 'companies.id = internships.company_id')
			->newest()
			->get();
		$items = $collection->display();

		return $this->layout()->render('internships/index', compact('items'));
	}
}