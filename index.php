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
Route::get('config', 'Config@index');
Route::get('config/:config/create', 'Config@edit')->with(':config', '[a-z]+');
Route::get('config/:config/:id/edit', 'Config@edit')->with(':config', '[a-z]+')->with(':id', '[0-9]+');
Route::post('config/:config/save', 'Config@save')->with(':config', '[a-z]+');
Route::get('config/:config/:id/delete', 'Config@delete')->with(':config', '[a-z]+')->with(':id', '[0-9]+');


Route::crud('/companies', 'Company');
Route::crud('/internships', 'Internship');
Route::get('ajax/internships/:id', 'Ajax@internships');
Route::run();