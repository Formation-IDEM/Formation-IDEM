<?php
namespace App\Models;

use Core\Model;

/**
 * Class UserModel
 *
 * @package App\Models
 */
class User extends Model
{
	protected $_table = 'users';

	protected $_fields = [
		'id'            =>  0,
		'name'      	=>  '',
		'firstname'		=>	'',
		'password'      =>  '',
		'email'         =>  '',
		'create_date'   =>  '',
		'update_date'   =>  '',
		'active'		=>	1
	];

	protected $_rules = [
		'username'  =>  'required',
		'password'  =>  'required|min:8|confirmed',
		'email'     =>  'required|email'
	];
}