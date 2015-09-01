<?php

/**
 * Class CompanyCollection
 */
class CompanyCollection extends Collection
{
    protected $_table = 'companies';
    protected $_model_name = 'company';

    /**
     * Retourne une entreprise en fonction de son ID
     *
     * @param int       $id
     * @param string    $field
     * @return mixed
     */
    public function getCompany($field = 'name', $id)
    {
        $result = $this->select($field)->from($this->_table)->limit(1)->get($id);
        return $result[$field];
    }
}
