<?php

/**
 * CompanyInternship.php
 */
class CompanyInternship
{
	protected $table = 'company_internship';

	private $id;
	private $companyId;
	private $internshipId;
	private $evaluation;
	private $realBegin;
	private $realEnd;
	private $hiring;

	public function __construct()
	{
		parent::__construct;
	}
}