<?php
namespace App\Models;

use \Core\Model;

/**
 * Class RemunerationType
 * @package App\Models
 */
class Nationality extends Model
{
    protected $_table = 'nationalities';

    protected $_fields = [
        'id'    =>  0,
        'title' =>  ''
    ];

    public $_rules = [
        'title' =>  'required'
    ];
}