<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of u_div
 *
 * @author nocturnus
 */
class u_select extends u_ {
    protected $mi_id;
    public function crear($param=null) 
{   
     if(!isset($param["id"])):
        $param["id"]=$this->mi_id;
     endif;

        $this->mi_id=@$param["id"];
        $this->code="<select ".parent::attribs($param)." >%urnusdev%</select>";
        return $this;
}

public function placeholder($texto) {
     parent::inserta("<option disabled selected>".$texto."</option>");
    return $this;
    
}
public function option_add($val,$texto) {
    
    parent::inserta("<option value='$val'>".$texto."</option>");
    return $this;
}
public function option_add_A($val,$u_index,$texto) {
    
    parent::inserta("<option value='$val' u_index='$u_index'>".$texto."</option>");
    return $this;
}        

public function option_add_array($array=null) {
    if(isset($array)):
        foreach ($array as $val => $texto) {
            parent::inserta("<option value='$val' u_index='$val'>".$texto."</option>"); 
        }       
    endif;    
    return $this;
}
public function set_val($value_op,$render=false)      
{
if($render):
?>
<script>
$("#<?php echo $this->mi_id;?>").val("<?php echo $value_op;?>");
</script>
<?php
else:
return '<script>
$("#'.$this->mi_id.'").val("'.$value_op.'");
</script>
';
endif;    
 

}
}
