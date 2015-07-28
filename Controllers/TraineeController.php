<?php

class TraineeController {

    function indexAction() {
		// indexAction - FrontController
		echo "indexAction - TraineeController";
		//$mytrainee = App::getModel("Trainee");
		//$nationality = App::getModel('Trainee')->load(3)->getNationality()->getData('title');
		//echo $nationality;
		var_dump(App::getModel("Trainee")->load(3)->getSessionsTrainee());
	}
	

}

?>