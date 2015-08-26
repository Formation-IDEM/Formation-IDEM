<?php
namespace App\Controllers;

use \Core\Controller;
use \Core\Html\Form;
use Core\Validator;

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class CompanyController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('Company');
	}

	/**
	 * Liste des entreprises
	 *
	 * @return mixed
	 */
	public function indexAction()
	{
		$items = $this->company->all();
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
		$form = new Form($_POST);
		return view('companies/create', compact('form'));
	}

	public function editAction($id)
	{
		$form = new Form($this->company->loadOrFail($id));
		return view('companies/create', compact('form'));
	}

	/**
	 * Sauvegarde d'une entreprise
	 */
	public function saveAction()
	{
		$validator = new Validator($this->company->_rules);
		if( $validator->run() )
		{
			$this->company->store(request()->all());
			$this->company->save();
			return redirect(url('companies'))->flash('success', 'L\'entreprise a correctement été enregistrée.');
		}
		response()->posts()->errors($validator->getErrors());
		$this->createAction();
	}

	/**
	 * Supprime
	 *
	 * @param $id
	 * @return $this
	 */
	public function deleteAction($id)
	{
		$this->company->loadOrFail($id)->delete();
		return redirect(url('companies'))->flash('success', 'L\'entreprise a correctement été supprimée');
	}
}