<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class Matter
 * @package App\Collections
 */
class MatterCollection extends Collection
{
    protected $collection = 'matters';

    public function __construct()
    {
        parent::__construct();
    }
}