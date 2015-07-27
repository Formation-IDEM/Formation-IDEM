<?php
namespace App\Models;

use \Core\Model;
/**
 * Class InternshipModel
 * @package App\Models
 */
class Internship extends Model
{
	protected $_fields = [
        'id'            =>  0,
        'title'         =>  '',
        'explain'       =>  '',
        'company_id'    =>  0,
        'formation_id'  =>  0,
        'referent_id'   =>  0,
        'create_date'   =>  '',
        'update_date'   =>  '',
        'create_uid'    =>  0,
        'update_uid'    =>  0,
        'active'        =>  0,
        'pay'           =>  false,
        'wage'          =>  0
    ];
}