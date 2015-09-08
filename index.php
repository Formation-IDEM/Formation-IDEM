
<?php
	
	define('ROOT', '');

	include_once('App.php');

	App::getInstance()->run();


	function url($url)
{
	return ROOT . $url;
}

?>