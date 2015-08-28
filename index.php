<?php
use Core\Facades\Route;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);
require_once(ROOT . 'App/common.php');

//  On lance notre application
$app = \App\App::getInstance();
$app->run();

//	Définition des routes
Route::get('/', 'Front@index');
Route::get('/404', 'Errors@404');
Route::get('/toto', 'Front@toto');
Route::get('/admin', 'Admin/Dashboard@index');
Route::crud('/companies', 'Company');
Route::crud('/internships', 'Internship');
Route::run();