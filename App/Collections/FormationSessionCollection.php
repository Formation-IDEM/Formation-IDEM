<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class FormationSessionCollection
 * @package App\Collections
 */
class FormationSessionCollection extends Collection
{
    protected $collection = 'formation_sessions';

    public function __construct()
    {
        parent::__construct();
    }
}