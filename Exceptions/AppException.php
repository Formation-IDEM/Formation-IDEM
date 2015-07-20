<?php

/**
 * AppException.php
 */
class AppException extends \Exception
{
	public function __construct($message = null)
	{
		print '<pre>';
		print_r($message);
		print '</pre>';
	}
}