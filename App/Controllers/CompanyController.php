<?php
namespace App\Controllers;

use \Core\Controller;
use Core\Factories\CollectionFactory;

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
		$this->loadModel('Company');
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
		$this->company->update([
			'name'		=>	'Test dsdq',
		], $id);
	}

	public function showAction($id)
	{
		$company = $this->company->load($id);
		 var_dump($company->getData());

	}

	public function deleteAction($id)
	{
		return $this->company->delete($id);
	}
}