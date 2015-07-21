<?php

include_once ('App.php');
include_once ('Models/Database.php');

App::getInstance()->run();
$db = Database::getInstance(); 

$data = $db->getResultats('SELECT * FROM trainees');
var_dump($data);


?>