<?php
namespace App\Models;

use \Core\Model;

/**
 * Class CompanyModel
 *
 * @package App\Models
 */
class CompanyModel extends Model
{
	protected $db;
	protected $_table = 'companies';

	protected $_fields = [
		'id'					=>	0,
		'name'				=>	'',
		'status'				=>	'',
		'company_name'		=>	'',
		'address'			=>	'',
		'postal_code'		=>	'',
		'city'				=>	'',
		'country'			=>	'',
		'phone'				=>	'',
		'mobile'				=>	'',
		'fax'					=>	'',
		'manager'			=>	'',
		'create_date'		=>	'',
		'update_date'		=>	'',
		'create_uid'		=>	0,
		'update_uid'		=>	0,
		'visit_date'		=>	'',
		'active'				=>	false,
	];

	private $_rules = [];
}