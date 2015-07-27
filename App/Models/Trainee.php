<?php
namespace App\Models;

use Core\Model;

/**
 * Class TraineeModel
 * @package App\Models
 */
class Trainee extends Model
{
    protected $_fields = [
        'id'                    =>  0,
        'name'                  =>  '',
        'firstname'             =>  '',
        'birthday'              =>  '',
        'birthdayplace'         =>  '',
        'gender'                =>  '',
        'adress_off_street'     =>  '',
        'adress_off_complement' =>  '',
        'adress_off_codpost'    =>  '',
        'adress_off_city'       =>  '',
        'adress_form_street'    =>  '',
        'adress_form_complement' =>  '',
        'adress_form_codpost'   =>  '',
        'adress_form_city'      =>  '',
        'phone'                 =>  '',
        'remuneration_type_id'  =>  0,
        'status_trainee_id'     =>  0,
        'study_levels_id'       =>  0,
        'family_status_id'      =>  0,
        'nationality_id'        =>  0
    ];
}