<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class TraineeCollection
 * @package App\Collections
 */
class TraineeCollection extends Collection
{
    protected $_table = 'trainees';
    protected $_model = 'trainee';

    public function __construct()
    {
        parent::__construct();
    }
}