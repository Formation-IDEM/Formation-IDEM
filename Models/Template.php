<?php

	class Template{
	
		protected $_filename = "index";
		protected $_datas = array();
		
		private static $_instance = null;		
		
	
		public function __contruct(){
			
			
		}
		
		//singleton
	 	public static function getInstance(){
	 	
			//on test s'il n'y a pas d'instance
			if (!self::$_instance){
				
				//on crée une nouvelle instance
				self::$_instance = new Template();
				
			}
			
			//on retourne l'instance
			return self::$_instance;
	
		} 
	
		public function getFilename(){
	            
	            return $this -> _filename;
	            
	    }
	        
	     public function setFilename($filename){
	            
	            return $this -> _filename = $filename;
	            
	     }
		 
		 public function getDatas(){
	            
	            return $this -> _datas;
	            
	    }
	        
	     public function setDatas($datas){
	            
	            $this -> _datas = $datas;
				
				return $this -> _datas;
	            
	     }	
		 
		 public function render(){
		 	
			extract($this -> _datas);
			
			if(file_exists(dirname(dirname(__FILE__))."/Views/".$this->_filename.".phtml")){
				
				include_once(dirname(dirname(__FILE__))."/Views/".$this->_filename.".phtml");
				
			}else{
				
				echo "ce fichier n'existe pas";
			}
			
		 }
	
	}
	
	