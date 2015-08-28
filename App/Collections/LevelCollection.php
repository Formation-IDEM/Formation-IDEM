<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class LevelCollection
 * @package App\Collections
 */
class LevelCollection extends Collection
{
    protected $collection = 'levels';

    public function __construct()
    {
        parent::__construct();
    }
}