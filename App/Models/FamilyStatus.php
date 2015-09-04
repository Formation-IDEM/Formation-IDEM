<?php
namespace App\Models;

use \Core\Model;

/**
 * Class FamilyStatus
 * @package App\Models
 */
class FamilyStatus extends Model
{
    protected $_table = 'family_status';

    protected $_fields = [
        'id'    =>  0,
        'title' =>  ''
    ];

    public $_rules = [
        'title' =>  'required'
    ];
}