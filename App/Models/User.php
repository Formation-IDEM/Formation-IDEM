<?php
namespace App\Models;

use \App\Models\Model;

/**
 * Class UserModel
 *
 * @package App\Models
 */
class User extends Model
{
	protected $_table = 'users';

	protected $fields = [
		'id'				=>	0,
		'email'				=>	'',
		'name'				=>	'',
		'firstname'			=>	'',
		'password'			=>	'',
		'auth'				=>	0,
		'create_date'		=>	'',
		'update_date'		=>	'',
		'active'			=>	0,
	];

	public $_rules = [
		'email'		=>	'required|email|unique:users',
		'password'	=>	'required|confirmation',
	];
}