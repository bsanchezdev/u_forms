<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of u_textarea
 *
 * @author nocturnus
 */
class u_textarea extends u_ {
    public function crear($param=null) 
{       $param["id"]=$this->mi_id;
        $this->code="<textarea ".parent::attribs($param)." >%urnusdev%</textarea>";
        return $this;
}
    
}
