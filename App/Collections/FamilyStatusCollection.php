<?php
namespace App\Collections;

use \Core\Collection;

/**
 * Class FamilyStatusCollection
 * @package App\Collections
 */
class FamilyStatusCollection extends Collection
{
    protected $collection = 'family_status';

    public function __construct()
    {
        parent::__construct();
    }
}