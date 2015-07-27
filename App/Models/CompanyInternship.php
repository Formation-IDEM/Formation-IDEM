<?php
namespace App\Models;

use \Core\Model;
/**
 * Class CompanyInternshipModel
 * @package App\Models
 */
class CompanyInternship extends Model
{
    protected $_fields = [
        'trainee_id'        =>  0,
        'company_id'        =>  0,
        'internship_id'     =>  0,
        'active'            =>  false,
        'hiring'            =>  false,
        'total_hours'       =>  0,
        'date_begin'        =>  '',
        'date_end'          =>  ''
    ];
}