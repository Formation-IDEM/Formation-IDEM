<?php
define('ROOT', './');
require_once(ROOT . 'App/App.php');
$app = App::getInstance();
$app->run();

$router = new Core\Router\Router($app->request()->getData('url'));
$router->get('/', function(){
	echo "Homepage";
});
$router->get('/truc', function(){
	echo 'Je suis un truc';
});
$router->run();