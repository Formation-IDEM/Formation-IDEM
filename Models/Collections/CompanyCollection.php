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
     * @return mixed
     */
    public function getCompany($id)
    {
        $result = $this->select('id', 'name')->from($this->_table)->where('id', '=', $id)->limit(1)->get();
        return $result->name;
    }
}
