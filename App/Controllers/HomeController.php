<?php
namespace App\Controllers;
/**
 * HomeController.php
 */
class HomeController extends Controller
{
	public function hello()
	{
		return $this->render('home');
	}
}