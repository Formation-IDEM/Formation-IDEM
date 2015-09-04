<?php
namespace App\Controllers;

use Core\Controller;

use Core\Html\Form;
use Core\Factories\ModelFactory;
use Core\Validator;

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
		$this->loadModel('internship');
	}

	/**
	 * Retourne la liste des stages
	 *
	 * @return mixed
	 */
	public function indexAction()
	{
		$items = collection('internship')->where('active', '=', 1)->all();
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
		return view('internships/form', [
			'url'			=>	url('internships/create'),
			'title'			=>	'Enregistrer un nouveau stage',
			'form'			=>	new Form($_POST),
			'internship'	=>	ModelFactory::loadModel('internship'),
			'company'		=>	ModelFactory::loadModel('company'),
			'companies'		=>	collection('company')->all(),
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
			'url'			=>	url('internships/' . $internship->id . '/edit'),
			'title'			=>	'Modifier un stage',
			'form'			=>	new Form($internship),
			'internship'	=>	$internship,
			'company'		=>	ModelFactory::loadModel('company'),
			'companies'		=>	collection('company')->orderBy('id', 'ASC')->all(),
			'formations'	=>	collection('formation')->orderBy('id', 'ASC')->all(),
		]);
	}

	public function saveAction()
	{
		$validator = new Validator($this->internship->_rules);
		if( $validator->run() )
		{
			$request = request()->all('POST');
			$request['pay'] = (int) $request['pay'];
			$request['active'] = (int) $request['active'];
			$this->internship->store($request)->save();
			return redirect(url('internships'))->flash('success', 'Le stage a correctement été sauvegardée.');
		}
		response()->posts()->errors($validator->getErrors());
		return $this->createAction();
	}

	public function deleteAction($id)
	{
		$this->internship->loadOrFail($id)->delete();
		return redirect(url('internships'))->flash('success', 'Le stage a correctement été supprimée');
	}
}