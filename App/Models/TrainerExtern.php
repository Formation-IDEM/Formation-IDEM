<?php
namespace App\Models;

use Core\Factories\ModelFactory;
use Core\Model;

/**
 * Class TrainerExternModel
 * @package App\Models
 */
class TrainerExtern extends Model
{
    protected $_fields = [
        'id'            =>  0,
        'hourly_rate'   =>  0,
        'trainer_id'    =>  0
    ];

    /**
     * Charge le formateur
     * @return mixed
     */
    public function getTrainer()
    {
        $trainer = ModelFactory::loadModel('trainer');
        $trainer->load($this->_fields['trainer_id']);
        return $trainer;
    }
}