<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);
require_once(ROOT . 'Core/helpers.php');

//	On lance notre application
require_once(ROOT . 'App/App.php');
$app = App\App::getInstance();
$app->run();

//	Définition des routes
route()->get('/', 'Front@index');
route()->get('/404', 'Errors@404');
route()->get('/toto', 'Front@toto');
route()->get('/admin', 'Admin/Dashboard@index');
route()->crud('/companies', 'Company');
route()->crud('/internships', 'Internship');
route()->run();