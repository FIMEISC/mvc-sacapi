<?php 
    $res = new ControladorGeneral();
    if($_GET["pagina"] == "facultades"){
        $id_name = "id_facultad";
    }else if ($_GET["pagina"] == "carreras"){
        $id_name = "id_carrera";
    }
    $res ->ctrlBorrarGeneral($_GET["pagina"],$id_name,$_GET["id"]);
?>