<?php
namespace App\Controllers;

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
		$items = collection('company')->active()->all();
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
		var_dump(method('last'));
		exit;
		$company = $this->company->loadOrFail($id);
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
			'company'	=>	ModelFactory::loadModel('company'),
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
		$company = $this->company->loadOrFail($id);
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
			$this->company->store(request()->all());
			$this->company->save();
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
		$company = $this->company->loadOrFail($id);
		$company->store(['active' => 0])->save();

		return redirect(url('companies'))->flash('success', 'L\'entreprise a correctement été supprimée');
	}
}