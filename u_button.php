<?php
/**
 * Description of u_div
 *
 * @author Benjamin Sanchez Cardenas nocturnus
 */
class u_button extends u_ {
    
       public function crear($param=null) 
{       $param["id"]=$this->mi_id;
        $this->code="<button ".parent::attribs($param)." >%urnusdev%</button>";
        return $this;
}

        

}
