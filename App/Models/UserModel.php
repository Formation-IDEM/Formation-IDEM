<?php
namespace App\Models;
/**
 * UserModel.php
 */

use \App\Models\Model;

class UserModel extends Model
{
	protected $table = 'users';

	protected $fields = [
		'id'					=>	0,
		'email'				=>	'',
		'password'			=>	'',
		'auth'				=>	0,
		'create_date'		=>	'',
		'update_date'		=>	'',
		'active'				=>	0,
	];
}