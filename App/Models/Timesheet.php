<?php
namespace App\Models;

use Core\Model;

/**
 * Class Timesheet
 * @package App\Models
 */
class Timesheet extends Model
{
    protected $_fields = [
        'id'            =>  0,
        'month'         =>  0,
        'year'          =>  0,
        'total_hours'   =>  0,
        'trainer_id'    =>  0,
        'formation_session_id'  =>  0
    ];
}