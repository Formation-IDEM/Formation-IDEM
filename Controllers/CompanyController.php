<?php

/**
 * Class CompanyController
 *
 * @package App\Controllers
 */
class CompanyController
{
	/**
	 * Constructor
	 */
	public function __construct(){}

	/**
	 * Liste des entreprises
	 *
	 * @return mixed
	 */
	public function indexAction()
	{
		$items = App::getCollection('company')->all();
		Template::getInstance()
		->setFileName("companies/index")
		->setDatas(array(
			'items' => $items
		))
		->render();
	}

	/**
	 * Vue d'une entreprise
	 *
	 * @param $id
	 * @return mixed
	 */
	public function showAction()
	{
		$company = App::getModel('company')->load($_GET['id']);
		Template::getInstance()
		->setFileName("companies/show")
		->setDatas(array(
			'company' => $company
		))
		->render();
	}

	/**
	 * Formulaire de création d'une entreprise
	 *
	 * @return mixed
	 */
	public function createAction()
	{
		$_POST['active'] = 1;
		Template::getInstance()
		->setFileName("companies/form")
		->setDatas(array(
			'url'		=>	'companies/create',
			'title'		=>	'Ajouter une nouvelle entreprise',
			'form'		=>	$_POST,
			'company'	=>	App::getModel('company'),
		))
		->render();
	}

	/**
	 * Formulaire d'édition
	 *
	 * @param $id
	 * @return mixed
	 */
	public function editAction()
	{
		$company = app::getModel('company')->load($_GET['id']);
		Template::getInstance()
		->setFileName("companies/form")
		->setDatas(array(
			'title'		=>	'Mettre à jour l\'entreprise "' . $company->name . '"',
			'company'	=>	$company,
		))
		->render();
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
			return redirect(App::url('companies'));
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

		return redirect(App::url('companies'))->flash('success', 'L\'entreprise a correctement été supprimée');
	}
}