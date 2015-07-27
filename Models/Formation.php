<?php

    include_once ('Model.php');

    class Formation extends Model{

        protected $_table = "formations";
        protected $_fields = array(
                                    'id'                            => 0,
                                    'average_effective'             => 0,
                                    'convention_hour_in_center'     => 0,
                                    'convention_hour_in_company'    => 0,
                                    'title'                         => '',
                                    'deal_code'                     => '',
                                    'order_giver'                   => '',
                                    'deal_begin_date'               => '',
                                    'deal_ending_date'              => ''
        
        );
        
        public function __construct(){
            
        }
        
        
        public function __construct(){
            
        }
        
    }