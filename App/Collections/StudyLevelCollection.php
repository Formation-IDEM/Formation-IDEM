<?php
namespace App\Collections;

use Core\Tables\Collection;

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