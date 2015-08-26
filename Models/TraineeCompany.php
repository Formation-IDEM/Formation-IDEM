<?php

include_once ('model.php');

/**
 * Relation Satigiaire Entreprise
 */
class TraineeCompany extends Model {
	
	private $_attribute;
	private $_evaluation;
	private $_begin;
	private $_end;
	private $_job;
	
	function __construct() {
		
		parent::__construct();
		
	}
}
