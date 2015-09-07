<?php
namespace App\Collections;

use Core\Collection;

/**
 * Class Trainer
 * @package App\Collections
 */
class TrainerCollection extends Collection
{
    protected $_table = 'trainers';
    protected $_model = 'trainer';

    public function __construct()
    {
        parent::__construct();
    }
}