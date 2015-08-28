<?php
class FrontController
{
	function indexAction()
	{
		header('Location: /index.php?c=Trainer&a=list');
	}
}

?>
