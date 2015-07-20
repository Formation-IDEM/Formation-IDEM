<?php
namespace App\Controllers\Admin;
/**
 * DashboardController.php
 */
use \App\Controllers\Controller;

class DashboardController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function indexAction()
	{
		echo 'dashboard';
	}
}