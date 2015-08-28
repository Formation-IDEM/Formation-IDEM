<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class StudyLevelCollection
 * @package App\Collections
 */
class StudyLevelCollection extends Collection
{
    protected $collection = 'study_levels';

    public function __construct()
    {
        parent::__construct();
    }
}