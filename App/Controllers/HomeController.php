<?php
namespace App\Controllers;
/**
 * HomeController.php
 */
class HomeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function hello()
	{
		//$this->setTitle('Accueil');
		return $this->render('home');
	}

	public function show($id)
	{
		echo 'Je suis l\'id n°' . $id;
	}
}