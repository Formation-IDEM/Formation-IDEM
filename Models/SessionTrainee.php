<?php
namespace App\Models;

use Core\Model;

/**
 * Class SessionTrainee
 * @package App\Models
 */
class SessionTrainee extends Model
{
    protected $_fields = [
        'id'            =>  0,
        'session_id'    =>  0,
        'trainee_id'    =>  0,
        'nb_hour_present_school'    =>  0,
        'nb_hour_present_trainer'   =>  0
    ];
}