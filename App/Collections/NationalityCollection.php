<?php
namespace App\Collections;

use Core\Tables\Collection;

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