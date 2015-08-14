<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of u_encode
 *
 * @author nocturnus
 */
class u_encode {
    public $ci;
    public function __construct() {
         $this->ci =&get_instance();
$this->ci->load->helper("file");
$this->ci->load->library('encrypt');
    }

    public function load_file($file=false) {
       
return  read_file($file);
    }
    
    public function encode($data,$key,$file) {
        $file=  str_replace(".php", ".u", $file);
        $data=$this->ci->encrypt->encode($data, $key);
        write_file($file, $data, 'w');
return $data;

    }
    
    public function decode($data,$key) {
        
return $this->ci->encrypt->decode($data, $key);
    }
    
    
    
}
