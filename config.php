<?php
$db_user = 'postgres';
$db_pass = 'postgres';
$db_database = 'idem';
$db_host = 'localhost';


// Controleurs niveau 3 : Etudiant
$firewall[3] = array(
		'Front'	=>	array('login','logout','index'),
		'Trainer'	=> array('index','list','show'),
		'Trainee'	=> array('index'),
		'Formation'	=>	array('index'),
		'Company'	=>	array('index', 'show'),
		'Ajax'	=>	array('listTrainer','autoComplete','nationalities','internships'),
	);

// Controleurs niveau 2 : Formateur
$firewall[2] = array(
		'Trainer'	=>	array('addEditMatters', 'participation', 'addEdit'),
		'Trainee'	=> array(),
		'Formation'	=> array(),
		'Company'	=>	array(),
		'Internship'	=>	array('index', 'show'),
		'Ajax'	=>	array('listMatter', 'listRefpedago'),
		'Front'	=> array(),
	);
$firewall[2] = array_merge($firewall[3], $firewall[2]);
foreach($firewall[3] as $sfl_key => $sfl_value) // SubFirewalL
{
	$firewall[2][$sfl_key] = array_merge($firewall[2][$sfl_key], $sfl_value);
}

// Controleurs niveau 1 : Administrateur
$firewall[1] = array(
		'Front'	=> array(),
		'Trainer'	=> array(),
		'Trainee'	=> array(),
		'Company'	=>	array('edit', 'create', 'save', 'delete'),
		'Internship'	=>	array('create', 'edit', 'save', 'delete'),
		'Formation'	=>	array('edit', 'save'),
		'Ajax'	=>	array('deleteInterventionsheet','interventionsheet', 'addInterventionsheetForm', 'editLevel', 'editLevelForm', 'deleteRefPedago', 'addRefPedago'),
		'Admin'	=>	array('listProfiles', 'createEditProfile', 'showProfile'),
	);
$firewall[1] = array_merge($firewall[2], $firewall[1]);
foreach($firewall[2] as $sfl_key => $sfl_value) // SubFirewalL
{
	$firewall[1][$sfl_key] = array_merge($firewall[1][$sfl_key], $sfl_value);
}
