<?php
namespace App\Models;

use Core\Model;

/**
 * Class Formation
 * @package App\Models
 */
class Formation extends Model
{
    protected $_fields = [
        'id'                =>  0,
        'title'             =>  '',
        'average_effective' =>  0,
        'convention_hour_center'    =>  '',
        'convention_hour_company'   =>  '',
        'deal_code'         =>  '',
        'order_giver'       =>  '',
        'deal_begin_date'   =>  '',
        'deal_ending_date'  =>  ''
    ];
}