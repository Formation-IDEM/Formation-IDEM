<?php

/**
 * Class FormationCollection
 */
class FormationCollection extends Collection
{
    protected $_table = 'formations';
    protected $_model_name = 'formation';

    public function __construct()
    {
        parent::__construct();
    }
}
