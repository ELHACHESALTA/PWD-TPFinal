<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmRol = new AbmRol();
if($objAbmRol->alta($datos)){
    $respuesta["respuesta"] = "Se realizó correctamente";
} else {
    $respuesta["respuesta"] = "No se pudo realizar el alta";
}
echo json_encode($respuesta);