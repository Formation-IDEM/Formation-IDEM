<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

//	On lance notre application
require_once(ROOT . 'App/App.php');
$app = App::getInstance();
$app->run();

//	Définition des routes
$app->route()->get('/', 'Home@hello');
$app->route()->get('/show/:id', 'Home@show');
$app->route()->get('/test', function()
{
	echo 'Je suis un test';
});
$app->route()->run();