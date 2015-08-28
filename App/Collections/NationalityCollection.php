<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class NationalityCollection
 * @package App\Collections
 */
class NationalityCollection extends Collection
{
    protected $collection = 'nationalities';

    public function __construct()
    {
        parent::__construct();
    }
}