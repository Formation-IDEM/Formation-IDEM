<?php

/**
 * Dirigeant.php
 */
class Dirigeant extends Personne
{
	public $id;
	private $stage_id;

	public function __construct($nom, $prenom, $email)
	{
		parent::__construct($nom, $prenom, $email);
	}

	public function setStageId($id)
	{
		$this->stage_id = $id;
	}

	public function getStageId()
	{
		return $this->stage_id;
	}
}