<?php
/**
 * Description of forms
 *
 * @author Benjamin Sanchez Cardenas
 */
include "u_encode.php";
class u_ extends u_encode{
    
   public function load_jqueryCDN() {
        $CI=  &get_instance();
        ?>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <?php
    }
    public function load_jquery($jquery="jquery-1.11.3.min") {
        $CI=  &get_instance();
        $CI->load->view("jquery/$jquery".".php");
    }
    
    protected function set_mi_id($mi_id)
    {
        $this->mi_id=$mi_id;
    }
    public function c($elemento,$id=null,$params=array()) {
        $this->mi_id=$id;
        require_once 'u_'.$elemento.".php";
        $objeto="u_".$elemento;
        $elementos["$elemento"][$id]=new $objeto();
        $this->elementos[$id]=$elementos;
        $elementos["$elemento"][$id]->set_mi_id($id);
        if(count($params)>0):
            $elementos["$elemento"][$id]->crear($params);
        endif;
        return $elementos["$elemento"][$id];
    }
    
    protected function attribs($param=null) {
        $attribs="";
        if(isset($param)):
            
        foreach ($param as $key => $value) {
           $attribs.=$key."=\"".$value."\" ";
        }
        endif;
        return $attribs;
    }
    
    
    
protected function prepara(){
    return str_replace("%urnusdev%", "", $this->code);
}

public function p() {
    $this->render();
}

public function render() {
    echo $this->prepara();    
}

public function ins($data) {
    return $this->inserta($data);
}
public function inserta($data) {
    
   $this->code = str_replace("%urnusdev%", $data."%urnusdev%", $this->code);
   return $this;
}

public function cod()
{
    return $this->codigo();
}

public function codigo()
{
    return str_replace("%urnusdev%", "", $this->code);
}

public function render_buffer() {
    foreach ($this->elementos as $id_elemento => $elemento):
        foreach ($elemento as $key => $value):
        $value[$id_elemento]->code=  str_replace("%urnusdev%", "", $value[$id_elemento]->code);
        echo $value[$id_elemento]->code;
        $k=$key;
        endforeach;
    endforeach;
}

public function clear_buffer() 
{unset($this->elementos); return $this;}

/* prefabricados */
public function box($texto_label="",$contenido="",$render=false,$params=null,$icono=false)
{
    
    $default=array(
        "label"=>array("class"=>"control-label col-md-2 col-sm-12 col-xs-12"),
        "span"=>array("class"=>"fa fa-user form-control-feedback right")
        );
    if(!isset($params)): 
        $params=$default;
        else: 
        
        endif;
if(!isset($mi_div))   $mi_div      =   $this->c("div", "u_div_form-group")   ;
if(!isset($mi_div_a)) $mi_div_a    =   $this->c("div", "u_div_contendor")    ;
if(!isset($mi_label)) $mi_label    =   $this->c("label", "u_label_text-box") ;
if(!isset($mi_span))  $mi_span     =   $this->c("span", "u_span")            ;
   
if($icono):
    $el_icono=$mi_span->crear($params["span"])->codigo();
else:    
    $el_icono="";
endif;


    $mi_div->crear(array("class"=>"form-group","urnusdev"=>"u_"))
                ->inserta(
                        $mi_label->crear($params["label"])
                        ->inserta($texto_label)->codigo().
                        $mi_div_a->crear(array("class"=>"col-md-10 col-sm-12 col-xs-12"))->inserta
                        (
                                $contenido.
                                $el_icono
                        )->codigo()
                        );;
    if($render):
        $mi_div->render();
    else:
        return $mi_div->codigo();    
    endif;
}

public function text_box($id="",$texto_label="",$val="",$render=false,$params=null,$icono=false) {
    if($icono):
    $el_icono=$icono;    
    $icono=true;
    else:
        $icono=false;
    $el_icono="fa fa-user";
    endif;
        
    
    $default=array(
        "label"=>array("class"=>"control-label col-md-2 col-sm-12 col-xs-12"),
        "input"=>array("class"=>"form-control","value"=>$val,"id"=>$id,"name"=>$id),
        "span"=>array("class"=>"$el_icono form-control-feedback right")
        );
    if(!isset($params)): 
        $params=$default;
        else: 
            
        endif;
        
if(!isset($mi_input)) $mi_input    =   $this->c("input", $id);//"u_input")          ;
  return  $this->box($texto_label,$mi_input->crear($params["input"])->codigo(),$render,$params,$icono);
}

public function combo_box($label="",$params,$options,$set_val="",$render=false) {
    
   $this->box($label, $this->combo($params,$options,$set_val,false),$render);
   //return $this;
}

public function combo_box_A($label="",$params,$options,$set_val="",$render=false) {
    
    $this->box($label, $this->combo_A($params,$options,$set_val,false),$render);
}

public function combo_box_B($label="",$params_container,$params,$options,$set_val="",$render=false) {
    
    $this->box($label, $this->combo($params,$options,$set_val,false),$render,$params_container);
}
public function campo_fecha($id="",$texto_label="",$val="",$render=false,$params=null)
{
 $default=array(
        "label"=>array("class"=>"control-label col-md-2 col-sm-12 col-xs-12"),
        "input"=>array(
            "class"=>"form-control",
            "type"=>"text",
            "data-inputmask"=>"'mask':'99-99-9999'",
            "value"=>$val,
            "id"=>$id,
            "name"=>$id),
        "span"=>array("class"=>"fa fa-calendar form-control-feedback right")
        );
    if(!isset($params)): 
        $params=$default;
        else: 
            
        endif;
        
if(!isset($mi_input)) $mi_input    =   $this->c("input", "u_input")          ;
if($render):
    echo $this->box($texto_label,$mi_input->crear($params["input"])->codigo(),false,$params,true);
else:
    return  $this->box($texto_label,$mi_input->crear($params["input"])->codigo(),true,$params,true);
endif;

     
}

public function combo($params,$options,$set_val="",$render=false) {
$select=$this->c("select", "u_select")->crear($params);
foreach ($options as $key => $value){$select->option_add($key,$value);}
if($render):
$select->render();$select->set_val($set_val,true);
else:    
return $select->codigo().$select->set_val($set_val);
endif;
}

public function combo_A($params,$options,$set_val="",$render=false) {
$select=$this->c("select", "u_select")->crear($params);
foreach ($options as $key => $value){
   //$this->inserta($this->attribs($options));
   foreach ($value as $key_ => $value_) {
    $select->option_add_A($key,$key_,$value_);    
   }
   
    }
if($render):
$select->render();$select->set_val($set_val,true);
else:    
return $select->codigo().$select->set_val($set_val);
endif;
}


//

    protected function load_f($file=false) {
     return   parent::load_file($file);
    }
    public function encode_file($file,$key="urnusdev") {
     $data=   $this->load_f($file);
     $data = parent::encode($data, $key,$file);
     return $data;
    }
    
    public function load($file,$key="urnusdev") {
     $data=   $this->load_f($file);
     $data = parent::decode($data, $key);
     return $data;
    }
    
    
}

