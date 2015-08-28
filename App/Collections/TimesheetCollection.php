<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class TimesheetCollection
 * @package App\Collections
 */
class TimesheetCollection extends Collection
{
    protected $collection = 'timesheets';

    public function __construct()
    {
        parent::__construct();
    }
}