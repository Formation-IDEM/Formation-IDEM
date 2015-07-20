<?php
/**
 * index.php
 */
session_start();
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

require_once(ROOT . 'Models/App.php');
$app = App::getInstance();
$app->run();