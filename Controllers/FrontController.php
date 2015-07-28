<?php



class FrontController {

    function indexAction() {
		// indexAction - FrontController
		echo "indexAction - FrontController";
		Template::getInstance()->setDatas(array("test"=>"test"))->render();
	}
		
}

?>