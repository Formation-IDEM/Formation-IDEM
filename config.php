<?php
$db_user = 'postgres';
$db_pass = 'postgres';
$db_database = 'idem';
$db_host = 'localhost';

// Controleurs niveau 3 : Etudiant
$firewall[3] = array(
		'Front'	=>	array('login','logout','index'),
		'Trainer'	=> array('index','list','show'),
	);

// Controleurs niveau 2 : Formateur
$firewall[2] = array(
		'Trainer'	=>	array('addEditMatters', 'timesheet', 'addEdit')
	);
array_merge($firewall[2], $firewall[3]);

// Controleurs niveau 1 : Administrateur
$firewall[1] = array(
	);
array_merge($firewall[1], $firewall[2]);
