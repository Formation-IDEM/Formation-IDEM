<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class Matter
 * @package App\Collections
 */
class MatterCollection extends Collection
{
    protected $_model = 'matter';
    protected $_table = 'matters';

    public function __construct()
    {
        parent::__construct();
    }
}