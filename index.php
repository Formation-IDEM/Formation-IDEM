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

/**
 * Configuration
 */
Route::get('config', 'Config@index');
Route::get('config/:config/create', 'Config@edit')->with(':config', '[a-z]+');
Route::get('config/:config/:id/edit', 'Config@edit')->with(':config', '[a-z]+')->with(':id', '[0-9]+');
Route::post('config/:config/save', 'Config@save')->with(':config', '[a-z]+');
Route::get('config/:config/:id/delete', 'Config@delete')->with(':config', '[a-z]+')->with(':id', '[0-9]+');

/**
 * Méthodes CRUD classiques
 */
Route::crud('users', 'User');
Route::crud('companies', 'Company');
Route::crud('internships', 'Internship');
Route::crud('trainers', 'Trainer');
Route::crud('admins', 'Admin');

//  Formations
Route::get('formations', 'Formation@index');
Route::get('formations/create', 'Formation@edit');
Route::post('formations/create', 'Formation@edit');
Route::get('formations/:id/edit', 'Formation@edit')->with(':id', '[0-9]+');
Route::post('formations/:id/edit', 'Formation@edit')->with(':id', '[0-9]+');

//  Formateurs
Route::get('trainers/:id/matters', 'Trainer@matters')->with(':id', '[0-9]+');
Route::post('trainers/:id/matters', 'Trainer@matters')->with(':id', '[0-9]+');
Route::get('trainers/:id/timesheet', 'Trainer@timesheet')->with(':id', '[0-9]+');
Route::post('trainers/:id/timesheet', 'Trainer@timesheet')->with(':id', '[0-9]+');
Route::get('trainers/:id/deletematter', 'Trainer@deleteMatter')->with(':id', '[0-9]+');

//  Utilisateur
Route::get('login', 'Auth@login')->middleware('guest');
Route::post('login', 'Auth@attempt')->middleware('guest');
//Route::get('register', 'Auth@register')->middleware('guest');
//Route::post('register', 'Auth@create')->middleware('guest');
Route::get('logout', 'Auth@logout')->middleware('auth');
Route::get('profile', 'Auth@profile')->middleware('auth');
Route::post('profile', 'Auth@updateProfile')->middleware('auth');

/**
 * Ajax
 */
Route::get('ajax/internships/:id', 'Ajax@internships');
Route::get('ajax/nationalities', 'Ajax@nationalities');
Route::post('ajax/level', 'Ajax@editLevelForm');
Route::post('ajax/editLevel', 'Ajax@editLevel');
Route::get('ajax/matters/:id', 'Ajax@listMatter')->with(':id', '[0-9]+');
Route::get('ajax/autoCompleteTrainer', 'Ajax@autoCompleteTrainer');
Route::post('ajax/listTrainer', 'Ajax@listTrainer');
Route::get('ajax/deleteRefPedago/:id', 'Ajax@deleteRefPedago')->with(':id', '[0-9]+');
Route::get('ajax/pedago/:id', 'Ajax@rlistRedPedago')->with(':id', '[0-9]+');

//  Démarrage des routes
Route::run();