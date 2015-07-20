<?php

/**
 * Controller.php
 */
class Controller
{
	private $pageTitle;
	private $layout;

	public function __construct()
	{
		if( is_null($this->pageTitle) || empty($this->pageTitle) )
		{
			$methods = get_class_methods(get_called_class());
			$this->pageTitle = ucfirst($methods[1]);
		}
		$this->layout = Layout::getInstance();
	}

	public function layout()
	{
		return $this->layout;
	}

	public function getTitle()
	{
		return $this->pageTitle;
	}

	public function setTitle($title)
	{
		$this->pageTitle = $title;
		return $this;
	}
}