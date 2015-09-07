<?php

/**
 * Class FrontController
 */
class FrontController
{
	public function logoutAction()
	{
		session_destroy();
		header('Location: /');
	}

	public function loginAction()
	{
		if(isset($_POST) && $_POST != null)
		{
			$profile = App::getModel('Profile')->load($_POST['email'], 'email');
			echo $profile->encryptPassword($_POST['password']);
			if($profile->getData('password') == $profile->encryptPassword($_POST['password']))
			{
				$_SESSION['login'] = true;
				$_SESSION['profile_id'] = $profile->getData('id');
				header('Location: /');
			}
		}
		Template::getInstance()
				->setFilename('Front/login')
				->render();
	}

	public function indexAction()
	{
		$stats = [
			'trainers'		=>	App::getCollection('trainer')->count(),
			'formations'	=>	App::getCollection('formation')->count(),
			'companies'		=>	App::getCollection('company')->count(),
			'trainees'		=>	App::getCollection('trainee')->count(),
			'students'		=>	App::getCollection('trainee')->latest()->limit(10)->all(),
			'internships'	=>	App::getCollection('internship')->latest()->limit(10)->all(),
		];

		return Template::getInstance()->setFilename('Front/index')->setDatas(compact('stats'))->render();
	}

	public function aboutAction()
	{

	}

	public function noPermission()
	{
		echo 'pas la permission';
	}
}
