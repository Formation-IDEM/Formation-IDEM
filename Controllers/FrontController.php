<?php

/**
 * WelcomeController.php
 */
class FrontController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->setTitle('Accueil');
		echo 'salut';
	}

	public function salut()
	{
		echo 'et moi je dis bonjour';
	}
}