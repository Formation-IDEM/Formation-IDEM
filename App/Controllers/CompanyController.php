<?php
namespace App\Controllers;

use \Core\Controller;
use \Core\Factories\CollectionFactory;

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
		return $this->layout()->render('home', compact('items'));
	}

	public function showAction($id)
	{
		$company = $this->company->load($id);
		return $this->layout()->render('single', compact('company'));
	}

	public function createAction()
	{
		$form = new \Core\Html\Form($_POST);
		return $this->layout()->render('companies/create', compact('form'));
	}

	public function storeAction()
	{
		$data = [];
		foreach( $_POST as $key => $value )
		{
			$data[$key] = htmlspecialchars($value);
		}

		$this->company->store($data)->save();
	}

	public function editAction()
	{

	}

	public function deleteAction()
	{

	}
}