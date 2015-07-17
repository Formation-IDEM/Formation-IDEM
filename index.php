<?php
include_once('Libs/App.php');
$app = App::getInstance();

$company = new Company();
$result = $company->find(43);