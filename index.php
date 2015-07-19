<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

require_once(ROOT . 'App/App.php');
$app = App::getInstance();
$app->run();

$router = new Core\Router\Router($app->request()->getData('url'));
$router->get('/', 'Home@hello');
$router->get('/hello', 'Home@hello');
$router->get('/truc', function(){
	echo 'Je suis un truc';
});
$router->run();