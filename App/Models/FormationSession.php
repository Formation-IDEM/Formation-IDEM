<?php
namespace App\Models;

use Core\Model;

/**
 * Class FormationSession
 * @package App\Models
 */
class FormationSession extends Model
{
    protected $_formation = null;
    protected $_table = 'formation_sessions';

    protected $_fields = [
        'id'            =>  0,
        'formations_id' =>  0,
        'begin_date'    =>  '',
        'ending_date'   =>  ''
    ];

    public function getFormation()
    {
        if(!$this->_formation)
        {
            $formation = App::getModel('Formation')->load($this->getData('formations_id'));
            $this->_formation = $formation;
        }

        return $this->_formation;
    }
}