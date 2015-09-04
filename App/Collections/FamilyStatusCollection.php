<?php
namespace App\Collections;

use \Core\Collection;

/**
 * Class FamilyStatusCollection
 * @package App\Collections
 */
class FamilyStatusCollection extends Collection
{
    protected $_model = 'familyStatus';
    protected $_table = 'family_status';

    public function __construct()
    {
        parent::__construct();
    }
}