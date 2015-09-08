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
	protected $middlewares = ['auth'];

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
		$company = model('company')->loadOrFail($internship->company_id);
		return view('internships/show', compact('internship', 'company'));
	}

	/**
	 * Formulaire de création
	 *
	 * @return mixed
	 */
	public function createAction()
	{
		$_POST['pay'] = 0;
		$_POST['active'] = 1;
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

	/**
	 * Sauvegarde un stage
	 *
	 * @return mixed
	 */
	public function saveAction()
	{
		$validator = new Validator($this->internship->_rules);
		if( $validator->run() )
		{
			$request = request()->all('POST');
			$request['wage'] = floatval($request['wage']);
			$request['pay'] = isset($request['pay']) ? (int) $request['pay'] : 0;
			$request['active'] = isset($request['active']) ? (int) $request['active'] : 0;
			$this->internship->store($request)->save();

			var_dump($this->internship);
			exit;

			$companyInternship = [
				'trainee_id'	=>	'',
				'company_id'	=>	$request['company_id'],
				'formation_id'	=>	$request['formation_id'],
				'active'		=>	$request['active'],
				'hiring'		=>	$request['pay'],
				'total_hours'	=>	0,
				'date_begin'	=>	$request['date_begin'],
				'date_end'		=>	$request['date_end']
			];

			return redirect(url('internships'))->flash('success', 'Le stage a correctement été sauvegardée.');
		}
		response()->posts()->errors($validator->getErrors());
		return $this->createAction();
	}

	/**
	 * Supprime (soft) un stage
	 *
	 * @param $id
	 * @return mixed
	 */
	public function deleteAction($id)
	{
		$internship = $this->internship->loadOrFail($id);
		$internship->store(['active' => 0])->save();
		return redirect(url('internships'))->flash('success', 'Le stage a correctement été supprimée');
	}
}