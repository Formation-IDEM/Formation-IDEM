<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class SessionTrainee
 * @package App\Models
 */
class SessionTraineeCollection extends Collection
{
    protected $collection = 'sessions_trainee';

    public function __construct()
    {
        parent::__construct();
    }
}