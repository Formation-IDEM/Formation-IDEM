<?php
/**
 * Person.php
 */

abstract class Person extends Model
{
	public $id;
	protected $name;
	protected $firstname;
	protected $email;

	public function __construct(){}

	abstract public function fullName();
}
