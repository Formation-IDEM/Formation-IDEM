<?php

/**
 * Class FormationCollection
 */
class FormationCollection extends Collection
{
    protected $_table = 'formations';
    protected $_model_name = 'Formation';

    public function __construct()
    {
        parent::__construct();
    }
}
