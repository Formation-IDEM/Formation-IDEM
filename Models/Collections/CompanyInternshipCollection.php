<?php
/**
 * Class CompanyInternshipModel
 */
class CompanyInternshipCollection extends Collection
{
    protected $_table = 'company_internship';
    protected $_model_name = 'companyInternship';

    public function __construct()
    {
        parent::__construct();
    }
}