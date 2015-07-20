<?php
namespace App\Controllers;
/**
 * CompanyController.php
 */

class CompanyController extends Controller
{
	protected $model = 'Company';

	public function __construct()
	{
		parent::__construct();
	}

	public function indexAction()
	{
		print '<pre>';
		print_r($this->model()->load(1));
		print '<pre>';
	}

	public function createAction()
	{
		$this->model()->insert([
			'name'				=>	'Test',
			'status'				=>	'SARL',
			'company_name'		=>	'Ma compagnie',
			'adress'				=>	'3 rue des fleuristes',
			'postal_code'		=>	'66000',
			'city'				=>	'Perpignan',
			'country'			=>	'France',
			'phone'				=>	'0734987678',
			'mobile'				=>	'0909090909',
			'manager_id'		=>	1,
			'create_uid'		=>	1
		]);
	}

	public function updateAction($id)
	{
		$this->model()->update([
			'name'		=>	'Test modifié',
		], $id);
	}

	public function showAction($id)
	{
		print '<pre>';
		print_r($this->model()->load($id));
		print '<pre>';
	}

	public function deleteAction($id)
	{
		return $this->model()->delete($id);
	}
}