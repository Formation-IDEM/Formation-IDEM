<?php
namespace App\Controllers;

use App\App;
use \Core\Controller;
use Core\Factories\ModelFactory;
use \Core\Html\Form;
use Core\Validator;

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class CompanyController extends Controller
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('company');
	}

	/**
	 * Liste des entreprises
	 *
	 * @return mixed
	 */
	public function indexAction()
	{
		$items = App::getCollection('company')->active()->all();
		return view('companies/index', compact('items'));
	}

	/**
	 * Vue d'une entreprise
	 *
	 * @param $id
	 * @return mixed
	 */
	public function showAction($id)
	{
		$company = App::getModel('company')->loadOrFail($id);
		return view('companies/show', compact('company'));
	}

	/**
	 * Formulaire de création d'une entreprise
	 *
	 * @return mixed
	 */
	public function createAction()
	{
		$_POST['active'] = 1;
		return view('companies/form', [
			'url'		=>	url('companies/create'),
			'title'		=>	'Ajouter une nouvelle entreprise',
			'form'		=>	new Form($_POST),
			'company'	=>	App::getModel('company'),
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
		$company = app::getModel('company')->loadOrFail($id);
		return view('companies/form', [
			'url'		=>	url('companies/' . $company->id . '/edit'),
			'title'		=>	'Mettre à jour l\'entreprise "' . $company->name . '"',
			'form'		=>	new Form($company),
			'company'	=>	$company,
		]);
	}

	/**
	 * Sauvegarde d'une entreprise
	 *
	 * @return mixed
	 */
	public function saveAction()
	{
		$validator = new Validator($this->company->_rules);
		if( $validator->run() )
		{
			App::getModel('company')->store(request()->all())->save();
			return redirect(url('companies'))->flash('success', 'L\'entreprise a correctement été sauvegardée.');
		}
		response()->posts()->errors($validator->getErrors());
		return $this->createAction();
	}

	/**
	 * Supprime un élément
	 *
	 * @param $id
	 * @return $this
	 */
	public function deleteAction($id)
	{
		$company = App::getModel('company')->loadOrFail($id);
		$company->store(['active' => 0])->save();

		return redirect(url('companies'))->flash('success', 'L\'entreprise a correctement été supprimée');
	}
}