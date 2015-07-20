<?php
namespace App\Controllers;
/**
 * HomeController.php
 */
class HomeController extends Controller
{
	protected $data = [];

	public function __construct()
	{
		parent::__construct();
	}

	public function hello()
	{
		$this->data += [
			'variable'	=>	'test',
		];

		return $this->layout()->render('home', $this->data);
	}

	public function show($id)
	{
		echo 'Je suis l\'id n°' . $id;
	}
}