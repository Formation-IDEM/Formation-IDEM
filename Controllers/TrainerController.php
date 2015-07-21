<?php

class TrainerController{
	
	public function __construct(){
		
	}
	
	public function indexAction(){
		echo "Trainers basic page";
	}
	
	public function editAction(){
		echo "Edit action on Trainer";
	}
	
	public function deleteAction(){
		echo "Delete action on Trainer";
	}

	public function errorAAction(){
		echo "An error as occured! ACTION NAME";
	}
}