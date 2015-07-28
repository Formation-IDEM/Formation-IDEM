<?php
namespace App\Models;

use \Core\Model;
use Core\Factories\CollectionFactory;

/**
 * Class CompanyModel
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $db;
	protected $_table = 'companies';

	protected $_fields = [
		'id'					=>	0,
		'name'					=>	'',
		'status'				=>	'',
		'company_name'			=>	'',
		'address'				=>	'',
		'postal_code'			=>	'',
		'city'					=>	'',
		'country'				=>	'',
		'phone'					=>	'',
		'mobile'				=>	'',
		'fax'					=>	'',
		'manager'				=>	'',
		'create_date'			=>	'',
		'update_date'			=>	'',
		'create_uid'			=>	0,
		'update_uid'			=>	0,
		'visit_date'			=>	'',
		'active'				=>	false,
	];

	private $_rules = [
        'name'  =>  [
            'required',
            'unique'
        ],
        ''
    ];

    /**
     * Retourne toutes les entreprises
     * @return mixed
     */
    public function all()
    {
        return CollectionFactory::loadCollection('company')->getAll();
    }

    /**
     * Retourne les stages d'une entreprise
     *
     * @return mixed
     */
	public function getInternships()
	{
		return CollectionFactory::loadCollection('internship')->getItemsByCompany($this->getData('id'));
	}
}