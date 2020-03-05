<?php 

require_once "controladores/plantilla.controlador.php";
require_once "controladores/general.controlador.php";
require_once "modelos/general.modelo.php";

require_once "controladores/usuarios.controlador.php";
require_once "modelos/usuarios.modelo.php";

require_once "controladores/fac_car.controlador.php";
require_once "modelos/fac_car.modelo.php";

require_once "controladores/alumnos.controlador.php";
require_once "modelos/alumnos.modelo.php";

$ruta = new ControladorGeneral();
$ruta -> ctrRuta();

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
?>