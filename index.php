<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

//	On lance notre application
require_once(ROOT . 'App/App.php');
$app = App\App::getInstance();
$app->run();

//	Définition des routes
$app->route()->get('/', 'Company@index');
$app->route()->get('/create', 'Company@create');
$app->route()->get('/update/:id', 'Company@update');
$app->route()->run();