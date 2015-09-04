<?php
namespace App\Models;

use \Core\Model;

/**
 * Class RemunerationType
 * @package App\Models
 */
class RemunerationType extends Model
{
    protected $_table = 'remuneration_types';

    protected $_fields = [
        'id'    =>  0,
        'title' =>  ''
    ];

    public $_rules = [
        'title' =>  'required'
    ];
}