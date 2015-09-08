<?php
namespace App\Models;

use \App\App;
use \Core\Model;

/**
 * Class Level
 * @package App\Models
 */
class Level extends Model
{
    protected $_trainer = null;
    protected $_matter = null;

    protected $_table = 'levels';

    protected $_fields = [
        'id'                =>  0,
        'note'              =>  0,
        'appreciation'      =>  '',
        'trainer_id'        =>  0,
        'matter_id'         =>  0,
        'create_date'       =>  '',
        'update_date'       =>  '',
        'create_uid'        =>  0,
        'update_uid'        =>  0,
        'active'            =>  1
    ];

    public function getTrainer()
    {
        if(!$this->_trainer)
        {
            $this->_trainer = App::getModel('Trainer')->load($this->getData('trainer_id'));
        }
        return $this->_trainer;
    }

    public function getMatter()
    {
        if(!$this->_matter)
        {
            $this->_matter = App::getModel('Matter')->load($this->getData('matter_id'));
        }
        return $this->_matter;
    }
}