<?php
namespace App\Models;

use Core\Model;

/**
 * Class FormationSession
 * @package App\Models
 */
class FormationSession extends Model
{
    protected $_fields = [
        'id'            =>  0,
        'formations_id' =>  0,
        'begin_date'    =>  '',
        'ending_date'   =>  ''
    ];
}