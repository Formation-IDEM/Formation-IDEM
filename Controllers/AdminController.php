<?php

class AdminController
{
	public function listProfilesAction()
	{
		if(isset($_POST['delete']) && $_POST['delete'])
		{
			$profile = App::getModel('Profile')->load($_POST['profile_id']);
			if($profile->getAnnounces() != null)
			{
				foreach($profile->getAnnounces() as $announce)
				{
					$announce
					->setData('active', false)
					->save();
				}
				$profile
				->setData('active', false)
				->save();
			}
			else
			{
				$profile->delete();
			}
		}
		Template::getInstance()
				->setFilename('Admin/list-profiles')
				->setDatas(array(
						'profiles' => App::getCollection('Profile')->getAllItems(),
						'title'	=> 'Liste des utilisateurs',
						))
				->render();
	}

	public function createEditProfileAction()
	{
		$profile = App::getModel('Profile');
		if(isset($_GET['id']) && $_GET['id'] != null)
		{
			$profile->load($_GET['id']);
		}

		if(isset($_POST) && $_POST != null)
		{
			if($_POST['password2'] != null)
			{
				if($_POST['password'] == $_POST['password2'])
				{
					unset($_POST['password2']);
					$_POST['password'] = $profile->encryptPassword($_POST['password']);
				}
				else
				{
					header('Location: /index.php?c=Front&a=error');
				}
			}
			else
			{
				unset($_POST['password'], $_POST['password2']);
			}
			$profile
			->store($_POST)
			->save();
			header('Location: /index.php?c=Admin&a=listProfiles');
		}			
		Template::getInstance()
				->setFilename('Admin/create-edit-profile')
				->setDatas(array(
						'profile' => $profile,
						'roles' => App::getCollection('Role')->getAllItems(),
						'title'	=> 'Ajouter ou modifier des utilisateurs',
						))
				->render();

	}

	public function showProfileAction()
	{
		if(isset($_GET['id']) && $_GET['id'] != null)
		{
			Template::getInstance()
					->setFilename('Admin/show')
					->setDatas(array(
							'profile' => App::getModel('Profile')->load($_GET['id']),
							'title'	=>	'Affichage du profil d\'utilisateur',
							))
					->render();
		}
	}
}