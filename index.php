<?php
   include_once('Formation.php');
   include_once('SessionFormation.php');
   
   $cap_metier = new sessionformation();
   
   echo $cap_metier -> getDateDebut();
   
?>