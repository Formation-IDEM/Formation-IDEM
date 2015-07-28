<?php
namespace App\Controllers;

use \Core\Controller;

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
		$items = $this->company->getInternships();
		var_dump($items);
		//return $this->layout()->render('home', compact('items'));
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
		$request = new \Core\Http\Request();
		$this->company->store($request->all('POST'))->save();
	}

	public function editAction()
	{

	}

	public function deleteAction()
	{

	}
}