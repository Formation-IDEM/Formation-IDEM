<?php
namespace App\Controllers;
/**
 * HomeController.php
 */
class HomeController extends Controller
{
	public function hello()
	{
		//$this->setTitle('Accueil');
		return $this->render('home');
	}
}