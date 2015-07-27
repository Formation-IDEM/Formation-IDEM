<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class RemunerationTypeCollection
 * @package App\Collections
 */
class RemunerationTypeCollection extends Collection
{
    protected $collection = 'remuneration_types';

    public function __construct()
    {
        parent::__construct();
    }
}