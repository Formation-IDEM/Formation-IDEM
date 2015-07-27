<?php
namespace App\Collections;

use Core\Tables\Collection;

/**
 * Class InternshipCollection
 * @package App\Collections
 */
class InternshipCollection extends Collection
{
        protected $collection = 'internships';

        public function __construct()
        {
                parent::__construct();
        }
}