<?php
namespace App\Models;

use \Core\Model;

/**
 * Class Level
 * @package App\Models
 */
class Level extends Model
{
    protected $_fields = [
        'id'            =>  0,
        'note'          =>  0,
        'appreciation'  =>  '',
        'matter_id'     =>  0,
        'trainer_id'    =>  0
    ];
}