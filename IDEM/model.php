<?php
    class Model
	{
		public function construct()
		{
			
		}
		
		/*
		public function load()
		{
			
		}
		*/
		
		public function __set($Key, $Value)
		{
			$this->{$Key} = $value;
			return $this;
		}
		
		public function __get($Key)
		{
			return $this->{$Key};
		}
			
				
	}
?>