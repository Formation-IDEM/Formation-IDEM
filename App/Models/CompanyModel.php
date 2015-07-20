<?php
namespace App\Models;
/**
 * Company.php
 */
use \Core\Model;
use \Core\Database\Database;

class CompanyModel extends Model
{
	protected $db;
	protected $table = 'companies';

	protected $fields = [
		'id',
		'name',
		'status',
		'company_name',
		'adress',
		'postal_code',
		'city',
		'country',
		'phone',
		'mobile',
		'fax',
		'manager_id',
		'created_date',
		'update_date',
		'create_uid',
		'update_uid',
		'date_visit',
		'active'
	];

	public $rules = [];
}