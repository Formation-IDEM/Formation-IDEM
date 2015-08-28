<?php
setlocale(LC_TIME, "");
setlocale(LC_TIME, 'fr_FR.UTF-8');
include_once('App.php');
include_once('helpers.php');

$monApp = App::getInstance();
$monApp->run();