<?php

/**
 * WelcomeController.php
 */
class WelcomeController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->setTitle('Accueil');
	}
}