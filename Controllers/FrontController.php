<?php

    class FrontController{
        
        public function __construct(){
            
        }
        
        public function indexAction(){
            
            Template::getInstance() -> render();            
            
        }
        
    }
