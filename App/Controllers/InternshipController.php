<?php
namespace App\Controllers;

use Core\Controller;
use Core\Factories\ModelFactory;
use Core\Html\Form;
use Core\Model;

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

	/**
	 * Retourne la liste des stages
	 *
	 * @return mixed
	 */
	public function indexAction()
	{
		$items = collection('internship')->all();
		return view('internships/index', compact('items'));
	}

	/**
	 * Visualisation d'un stage
	 *
	 * @param $id
	 * @return mixed
	 */
	public function showAction($id)
	{
		$internship = $this->internship->loadOrFail($id);
		return view('internships/internship', compact('internship'));
	}

	/**
	 * Formulaire de création
	 *
	 * @return mixed
	 */
	public function createAction()
	{
		$companies = collection('company');
		return view('internships/form', [
			'url'			=>	url('internships/create'),
			'title'			=>	'Proposer un nouveau stage',
			'form'			=>	new Form($_POST),
			'company'		=>	ModelFactory::loadModel('company'),
			'companies'		=>	$companies->all(),
			'formations'	=>	collection('formation')->all(),
		]);
	}

	/**
	 * Formulaire d'édition
	 *
	 * @param $id
	 * @return mixed
	 */
	public function editAction($id)
	{
		$internship = $this->internship->loadOrFail($id);
		return view('internships/form', [
			'url'		=>	url('internships/' . $internship->id . '/edit'),
			'title'		=>	'Modifier un stage',
			'form'		=>	new Form($internship),
			'company'	=>	ModelFactory::loadModel('internship'),
		]);
	}

	public function saveAction()
	{

	}

	public function deleteAction($id)
	{

	}
}