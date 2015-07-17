<?php
    include_once('Formation.php');
    include_once('SessionFormation.php');
    
    $test = "coucou";
        
    $cap_metier = new Formation ($test);
        
    echo $cap_metier -> montrerHeureConventionCentre();
