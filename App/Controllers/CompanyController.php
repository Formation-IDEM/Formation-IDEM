<?php
namespace App\Controllers;
/**
 * CompanyController.php
 */
use \App\App;

class CompanyController extends Controller
{
	protected $model = 'Company';

	public function __construct()
	{
		parent::__construct();
	}

	public function indexAction()
	{
		$data = $this->model()->find(1);
		var_dump($data);
	}
}