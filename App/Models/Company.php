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
	protected $_table = 'companies';

	protected $_fields = [
		'id'					=>	0,
		'name'					=>	'',
		'status'				=>	'',
		'email'					=>	'',
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
		'visit_date'			=>	null,
		'active'				=>	1,
	];

	public $_rules = [
        'name'		=> 	'unique:companies|required|min:3',
		'address' 	=>	'required',
		'email'		=>	'required|email',
		'city'		=>	'required',
		'country'	=>	'required',
		'phone'		=>	'required|phone'
    ];

    /**
     * Retourne les stages d'une entreprise
     *
     * @return mixed
     */
	public function getInternships()
	{
		return CollectionFactory::loadCollection('internship')->getItemsByCompany($this->getData('id'));
	}

	/**
	 * Retourne le nombre de stages d'une entreprise
	 *
	 * @return mixed
	 */
	public function countInternships()
	{
		return collection('internship')->countInternships($this->getData('id'));
	}
}