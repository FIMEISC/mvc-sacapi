<?php
    require_once "../controladores/general.controlador.php";
    require_once "../modelos/general.modelo.php";

    if($_REQUEST['tabla'] == "carreras"){
        echo "id de la facultad a la que pertenece".$_REQUEST["id_facultad"];
    }

    echo $tabla = $_REQUEST["tabla"];
    echo $id = $_REQUEST["id"];
    echo $value = $_REQUEST["nombre"];
    

    $plantilla = new ControladorGeneral();
   echo $plantilla -> ctrlEditar($tabla, $id, $value);

    if ($plantilla == "success"){
        header("location: $_SERVER[HTTP_REFERER]/si");
    }else{
        header("location: $_SERVER[HTTP_REFERER]/no");
    }

?>