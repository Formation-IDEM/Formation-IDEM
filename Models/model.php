<?php

/**
 * Model (Généralités) classe mère
 */
class Model {
	
	function __construct() {
		
	}
	
	public function __set($key, $value){
		
		$this->{$key} = $value;
		return $this;
	
	}
	
	public function __get($key)
	{

		return $this->{$key};

	}
	
}
