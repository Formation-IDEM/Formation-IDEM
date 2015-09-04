<?php
namespace App\Models;

use \Core\Model;

/**
 * Class TraineeStatus
 * @package App\Models
 */
class TraineeStatus extends Model
{
    protected $_table = 'trainee_status';

    protected $_fields = [
        'id'    =>  0,
        'title' =>  ''
    ];

    public $_rules = [
        'title' =>  'required'
    ];
}