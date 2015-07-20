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
	protected $table = 'companies';

	protected $fields = [
		'id'					=>	0,
		'name'				=>	'',
		'status'				=>	'',
		'company_name'		=>	'',
		'adress'				=>	'',
		'postal_code'		=>	'',
		'city'				=>	'',
		'country'			=>	'',
		'phone'				=>	'',
		'mobile'				=>	'',
		'fax'					=>	'',
		'manager_id'		=>	0,
		'create_date'		=>	'',
		'update_date'		=>	'',
		'create_uid'		=>	0,
		'update_uid'		=>	0,
		'date_visit'		=>	'',
		'active'				=>	false,
	];

	public $rules = [];
}