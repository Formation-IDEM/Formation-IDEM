<?php
namespace App\Controllers;

use App\Models\Company;
use \Core\Controller;
use \App\Collections\CompanyCollection;
use Core\Factories\CollectionFactory;
use Core\Factories\DatabaseFactory;

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class CompanyController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function indexAction()
	{
		$collection = CollectionFactory::loadCollection('Company');
		$items = $collection->all();
		return $this->layout()->render('single', compact('items'));
	}

	public function createAction()
	{
		$collection = CollectionFactory::loadCollection('CompanyInternship');

		for( $i = 0; $i < 5; $i++ )
		{

			$collection->insert([
				'trainee_id'		=>	($i + 1),
				'company_id'		=>	($i + 1),
				'internship_id'		=>	($i + 1),
				'active'			=>	true,
				'total_hours'		=>	rand(100, 200),
				'date_begin'		=>	date('Y-m-d H:i:s', time()),
				'date_end'			=>	date('Y-m-d H:i:s', (time() + (60 * 60 * 24 * 30))),
			]);

		}
	}

	public function editAction($id)
	{
		$this->model()->update([
			'name'		=>	'Test dsdq',
		], $id);
	}

	public function showAction($id)
	{
		echo 'salut';
	}

	public function deleteAction($id)
	{
		return $this->model()->delete($id);
	}
}