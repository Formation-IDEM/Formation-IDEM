<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class Trainer
 * @package App\Collections
 */
class TrainerCollection extends Collection
{
    protected $collection = 'trainers';

    public function __construct()
    {
        parent::__construct();
    }
}