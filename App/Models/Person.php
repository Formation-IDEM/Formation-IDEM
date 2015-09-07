<?php
namespace App\Models;

use Core\Model;

/**
 * Class Person
 * @package App\Models
 */
abstract class Person extends Model
{
    protected $_fields = [
        'id'            =>  0,
        'name'          =>  '',
        'firstname'     =>  '',
        'phone'         =>  '',
        'cellphone'     =>  '',
        'mail'          =>  '',
        'birthday'      =>  '',
        'birthdayplace' =>  '',
        'gender'        =>  '',
        'address_off_street'        =>  '',
        'address_off_complement'    =>  '',
        'address_off_codpost'       =>  '',
        'address_off_city'          =>  '',
        'address_form_street'       =>  '',
        'address_form_complement'   =>  '',
        'address_form_codpost'      =>  '',
        'social_security_number'    =>  null,
        'photo'                     =>  '',
        'nationality_id'            =>  0,
        'family_status_id'          =>  0,
        'create_date'               =>  null,
        'update_date'               =>  null,
        'create_uid'               =>  0,
        'update_uid'               =>  0,
    ];
}
