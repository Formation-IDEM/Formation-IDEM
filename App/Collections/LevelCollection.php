<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class LevelCollection
 * @package App\Collections
 */
class LevelCollection extends Collection
{
    protected $_table = 'levels';
    protected $_model = 'level';

    public function __construct()
    {
        parent::__construct();
    }
}