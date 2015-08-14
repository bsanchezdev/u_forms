# u_forms

Libreria para Codeigniter 3.

Diseñada para crear elementos de formularios (input, select, div, button...)

Ejemplo :

<?php
$in="input";$sel="select";$ta="textarea";
$style="margin: 5px 0px;";

$u_->c($in,"otec",array(
    "name"=>"otec",
    "class"=>"form-control",
    "placeholder"=>"Nombre de la OTEC","style"=>$style));

$u_->c($in,"sede",array(
    "name"=>"sede",
    "class"=>"form-control",
    "placeholder"=>"Sede que solicita la capacitación","style"=>$style));

$u_->c($sel,"modalidad",array(
    "name"=>"modalidad",
    "class"=>"form-control","style"=>$style))
        ->placeholder("Seleccione Modalidad")
        ->option_add_array($ci->paso_1->modalidades());

$u_->c($sel,"actividad",array(
    "name"=>"actividad",
    "class"=>"form-control","style"=>$style))
        ->placeholder("Seleccione Actividad")
        ->option_add_array($ci->paso_1->actividad());


$u_->c($ta,"fundamentacion_tecnica",array(
    "name"=>"fundamentacion_tecnica",
    "class"=>"form-control",
    "placeholder"=>"Fundamentación Técnica","style"=>$style));

$u_->c($ta,"poblac_obje",array(
    "name"=>"poblac_obj",
    "class"=>"form-control",
    "placeholder"=>"Población Objetivo","style"=>$style));

$u_->c($ta,"requisitos",array(
    "name"=>"requisitos",
    "class"=>"form-control",
    "placeholder"=>"Requisitos de Ingreso (Incluir los conocimientos del participante en el manejo de Internet si el curso se relaciona con modalidad elearning)","style"=>$style));

$u_->render_buffer();
