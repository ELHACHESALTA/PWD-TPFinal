<?php 
include_once "../../configuracion.php";
$datos = data_submitted();
$objAbmRol = new AbmRol();
if($objAbmRol->baja($datos)){
    $respuesta = "se dio de baja el rol";
} else {
    $respuesta = "no se pudo dar de baja el rol";
}

echo json_encode($respuesta);