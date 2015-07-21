<?php
    class FrontController {

    	public function __construct() {

    	}
		
		public static function indexAction() {
			$myTrainee = App::getModel("Trainee");
			$myTrainee -> load(4);
			var_dump ($myTrainee);
		}
		
	}
?>