<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class TimesheetCollection
 * @package App\Collections
 */
class TimesheetCollection extends Collection
{
    protected $_model = 'timesheet';
    protected $_table = 'timesheets';

    public function __construct()
    {
        parent::__construct();
    }
}