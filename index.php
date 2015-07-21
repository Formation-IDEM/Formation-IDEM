<?php

	
   	include_once('Models/FormationSession.php');
   	include_once('App.php');
   
  // $cap_metier = new sessionformation();
   
   //echo $cap_metier -> getDateDebut();
   
   //on crée une nouvelle instance que l'on stock dans une variable
   $salut = App::getInstance();
   
   //on appelle l'objet
   $salut -> run();
   
  
   
?>