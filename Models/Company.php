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
}
