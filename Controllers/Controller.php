<?php

/**
 * Controller.php
 */
class Controller
{
	private $pageTitle;

	public function __construct()
	{
		if( is_null($this->pageTitle) || empty($this->pageTitle) )
		{
			$methods = get_class_methods(get_called_class());
			$this->title = ucfirst($methods[1]);
		}
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