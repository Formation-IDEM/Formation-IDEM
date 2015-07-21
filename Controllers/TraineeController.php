<?php
    class TraineeController {

    	public function __construct() {
    		
    	}
		
		public static function indexAction() {
			echo "Index trainee";
		}
		
		public static function editAction() {
			echo "Edit trainee";
		}

		public static function deleteAction() {
			echo "Delete trainee";
		}
		
		public function register() {
			$mf = App::getModel("Trainee");
			$mf -> load(1); 
			echo $mf -> getName();
		}
		
    }
?>