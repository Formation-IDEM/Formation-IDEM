<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class TraineeStatus
 * @package App\Collections
 */
class TraineeStatusCollection extends Collection
{
    protected $collection = 'trainee_status';

    public function __construct()
    {
        parent::__construct();
    }
}