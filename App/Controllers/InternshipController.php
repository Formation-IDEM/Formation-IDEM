<?php
namespace App\Controllers;

use Core\Controller;

/**
 * Class InternshipController
 *
 * @package App\Controllers
 */
class InternshipController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Internship');
	}

	public function indexAction()
	{
		$items = $this->internship->getCollection()->getInternshipsCompany();
		var_dump($items);
		//return $this->layout()->render('internships/index', compact('items'));
	}

	public function showAction($id)
	{
		$internship = $this->internship->load($id);
		return $this->layout()->render('internships/internship', compact('internship'));
	}
}