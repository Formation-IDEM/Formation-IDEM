<?php

/**
 * ErrorController.php
 * ------------
 *
 * @author  :  RIBES Alexandre
 * @contact : ribes.alexandre@gmail.com
 * @website : http://www.alexandre-ribes.fr
 */
class ErrorController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function show404()
	{
		header('HTTP/1.0 404 Not Found');
		$this->setTitle('Erreur 404');
		echo 'Erreur 404 ! Page non trouvée';
	}
}