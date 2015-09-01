<?php
/**
 * Class Company
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
        'active'				=>	0,
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
     * Retourne toutes les entreprises
     * @return mixed
     */
    public function all()
    {
        return App::getCollection('company')->getAll();
    }

    /**
     * Retourne les stages d'une entreprise
     *
     * @return mixed
     */
    public function getInternships()
    {
        return App::getCollection('internship')->getItemsByCompany($this->getData('id'));
    }

    /**
     * Retourne le nombre de stages d'une entreprise
     *
     * @return mixed
     */
    public function countInternships()
    {
        return App::getCollection('internship')->countInternships($this->getData('id'));
    }
}