<?php 
include_once "../../../configuracion.php";
$datos = data_submitted();
$objAbmRol = new AbmRol();
if($objAbmRol->alta($datos)){
    $respuesta["respuesta"] = "Se dio de alta el Rol correctamente!";
} else {
    $respuesta["errorMsg"] = "No se pudo realizar el alta";
}
echo json_encode($respuesta);