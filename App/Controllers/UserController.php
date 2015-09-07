<?php
namespace App\Controllers;
use Core\Factories\ModelFactory;
use Core\Validator;

/**
 * Class UserController
 *
 * @package App\Controllers
 */
class UserController
{
	public function __construct()
	{
		parent::__construct();
		$this->loadModel('user');
	}

	public function indexAction()
	{
		$users = collection('user')->orderBy('id', 'asc')->all();
		return view('users/index', compact('users'));
	}

	public function createAction()
	{
		return view('users/form', [
			'url'	=>	url('users/create'),
			'user'	=>	ModelFactory::loadModel('user'),
			'form'	=>	new Form($_POST),
		]);
	}

	public function editAction($id)
	{
		$user = ModelFactory::loadModel('user')->loadOrFail($id);
		return view('users/form', [
			'url'	=>	url('users/' . $user->id, '/edit'),
			'user'	=>	$user,
			'form'	=>	new Form($user)
		]);
	}

	public function saveAction()
	{
		$validator = new Validator($this->user->_rules);
		if( $validator->run() )
		{
			$this->user->store(request()->all('POST'))->save();
			return redirect(url('users'))->flash('success', 'L\'Administrateur a correctement été ajouté.');
		}
		response()->posts()->errors($validator->getErrors());
		$this->createAction();
	}

	public function deleteAction($id)
	{
		$user = $this->user->loadOrFail($id);
		$user->delete();
		return redirect(url('users'))->flash('success', 'L\'administrateur a correctement été supprimé.');
	}
}