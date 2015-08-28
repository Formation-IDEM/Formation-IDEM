<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class TrainerExternCollection
 * @package App\Collections
 */
class TrainerExternCollection extends Collection
{
    protected $collection = 'trainers_externs';

    public function __construct()
    {
        parent::__construct();
    }
}