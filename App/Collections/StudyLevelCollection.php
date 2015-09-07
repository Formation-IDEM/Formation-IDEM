<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class StudyLevelCollection
 * @package App\Collections
 */
class StudyLevelCollection extends Collection
{
    protected $_model = 'studyLevel';
    protected $_table = 'study_levels';

    public function __construct()
    {
        parent::__construct();
    }
}