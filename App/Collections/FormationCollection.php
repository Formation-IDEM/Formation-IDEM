<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class FormationCollection
 * @package App\Collections
 */
class FormationCollection extends Collection
{
    protected $collection = 'formations';

    public function __construct()
    {
        parent::__construct();
    }
}