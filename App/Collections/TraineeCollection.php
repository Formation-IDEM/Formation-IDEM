<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class TraineeCollection
 * @package App\Collections
 */
class TraineeCollection extends Collection
{
    protected $collection = 'trainees';

    public function __construct()
    {
        parent::__construct();
    }
}