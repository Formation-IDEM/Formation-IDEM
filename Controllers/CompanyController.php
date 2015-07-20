<?php

/**
 * CompanyController.php
 */
class CompanyController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		return $this->layout()->render('company.index');
	}
}