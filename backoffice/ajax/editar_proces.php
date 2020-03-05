<?php

    //VARIABLES

    $id = $_POST['id'];
    $type = $_POST['tipo'];
    $value = $_POST['nombre'];
    
    $res = new ControladorGeneral();


    if($type == "facultades"){
        $id_name = "id_facultad";
    }else if ($type == "carreras"){
        $id_name = "id_carrera";
    }
    $res ->ctrlEditar($id_name, $id_name, $value);
?>